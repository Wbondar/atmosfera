<?php

namespace Domain\Mapper;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;

class NativeArticleMapper
extends DomainMapper
implements ArticleMapper
{
    public function __construct (AdapterInterface $dbAdapter)
    {
        parent::__construct($dbAdapter);

        $this->getArticleQuery = "
            SELECT id, title, author_id, published_at, category_id, bitmap AS preview, content
            FROM article JOIN static_preview ON article.id = static_preview.article_id
        ";
    }
    
    public function getAll( )
    {
        $resultSet = new ResultSet( );
        try
        {
            $result = $this->dbAdapter->query($this->getArticleQuery)->execute( );
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to fetch all articles: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function getAllActual ( )
    {
        $resultSet = new ResultSet( );
        try 
        {
            $result = $this->dbAdapter->query($this->getArticleQuery . " WHERE article.published_at <= NOW( );")->execute( );
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to fetch all actual articles: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function getActualUnderCategory ($articleCategory)
    {
        if ($articleCategory instanceof ArticleCategory)
        {
            $articleCategoryId = $articleCategory->getId( );
        } else {
            $articleCategoryId = $articleCategory;
        }

        $resultSet = new ResultSet( );
        try 
        {
            $result = $this->dbAdapter->query($this->getArticleQuery . " WHERE article.category_id = ? AND article.published_at <= NOW( );")->execute(array($articleCategoryId));
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to fetch actual articles under category: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function getById ($articleId)
    {
        $resultSet = new ResultSet( );
        try
        {
            $result = $this->dbAdapter->query($this->getArticleQuery . " WHERE article.id = ? LIMIT 1;")->execute(array($articleId));
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to fetch article by id: " . $e->getMessage( ));
        }
        return $resultSet; 
    }

    private function uploadPreview ($articleId, $path)
    {
        try
        {
            if (!fopen($path, 'r'))
            {
                throw new \Exception("Failed to read preview image file.");
            }
            $sql = new Sql($this->dbAdapter);
            $delete = $sql->delete('static_preview');
            $delete->where(array('article_id' => (integer) $articleId));
            $deleteStatement = $sql->getSqlStringForSqlObject($delete);
            $result = $this->dbAdapter->query($deleteStatement)->execute( );

            $insert = $sql->insert('static_preview');
            $insert->values(array('article_id' => (integer) $articleId, 'bitmap' => file_get_contents($path)));
            $insertStatement = $sql->getSqlStringForSqlObject($insert);
            $result = $this->dbAdapter->query($insertStatement)->execute( );

            unlink($path);
        } catch (\Exception $e) {
            throw new \Exception("Failed to upload preview: " . $e->getMessage( ));
        }
    }

    public function add ($args)
    {
        try
        {
            $insertArticleQuery = "
                INSERT INTO article 
                (
                      title
                    , published_at
                    , author_id
                    , category_id
                    , content
                ) VALUES (?, ?, ?, ?, ?);
            "
            ;
            $this->dbAdapter->query("START TRANSACTION;")->execute( );
            $this->dbAdapter->query($insertArticleQuery)->execute(array($args['title'], $args['published_at'], $args['author_id'], $args['category_id'], $args['content']));

            $result = $this->dbAdapter->query("SELECT LAST_INSERT_ID( ) AS id;")->execute( );
            foreach ($result as $row)
            {
                $articleId = $row['id'];
            }

            $this->uploadPreview($articleId, $args['preview']['path']);
            $this->dbAdapter->query("COMMIT;")->execute( );
            return $this->dbAdapter->query("SELECT ? AS id;")->execute(array($articleId));
        } catch (\Exception $e) {
            $this->dbAdapter->query("ROLLBACK;")->execute( );
            throw new \Exception ("Failed to insert data to the database: " . $e->getMessage( ));
        }

        return null;
    }

    public function modify ($args)
    {
        $resultSet = new ResultSet( );

        if (isset($args['preview']) && !empty($args['preview']))
        {
            $path = $args['preview']['path'];
        }
        unset($args['preview']);
        unset($args['action']);

        $sql = new Sql($this->dbAdapter);
        $update = $sql->update('article');
        $update->set($args)->where(array ('id' => (integer)$args['id']));

        $statement = $sql->getSqlStringForSqlObject($update);
        try 
        {
            $result = $this->dbAdapter->query($statement)->execute( );
            $resultSet->initialize($result);
            if (isset($path) && !empty($path))
            {
                $this->uploadPreview($args['id'], $path);
            }
        } catch (\Exception $e) {
            throw new \Exception("Failed to modify article: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function remove ($articleId)
    {
        $resultSet = new ResultSet( );
        try
        {
            $result = $this->dbAdapter->query("DELETE FROM article WHERE id = ? LIMIT 1;")->execute(array ((integer)$articleId));
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to remove article: " . $e->getMessage( ));
        }
        return $resultSet;
    }
}