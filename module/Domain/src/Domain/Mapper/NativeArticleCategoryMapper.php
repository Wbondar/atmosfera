<?php

namespace Domain\Mapper;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\AdapterInterface;

class NativeArticleCategoryMapper
extends DomainMapper
implements ArticleCategoryMapper
{
    public function __construct (AdapterInterface $dbAdapter)
    {
        parent::__construct($dbAdapter);
    }

    public function getAll ( )
    {
        $resultSet = new ResultSet( );
        try
        {
            $result = $this->dbAdapter->query("SELECT id, title FROM article_category;")->execute( );
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to fetch all article categories: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function getById ($articleCategoryId)
    {
        $resultSet = new ResultSet( );
        try 
        {
            $result = $this->dbAdapter->query("SELECT id, title FROM article_category WHERE article_category.id = ? LIMIT 1;")->execute(array($articleCategoryId));
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to fetch article category by id: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function getByTitle ($articleCategoryTitle)
    {
        $resultSet = new ResultSet( );
        try
        {
            $result = $this->dbAdapter->query("SELECT id, title FROM article_category WHERE UPPER(article_category.title) = UPPER(?) LIMIT 1;")->execute(array($articleCategoryTitle));
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to fetch article category by title: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function add ($args)
    {
        $resultSet = new ResultSet( );
        try
        {
            $this->dbAdapter->query("INSERT INTO article_category (title) VALUES (?);")->execute(array($args['title']));
            $result = $this->dbAdapter->query("SELECT LAST_INSERT_ID( ) AS id;")->execute( );
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to insert article category to the database: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function modify ($args)
    {
        $resultSet = new ResultSet( );
        try
        {
            $result = $this->dbAdapter->query("UPDATE article_category SET title = :title WHERE id = :id LIMIT 1;")->execute($args);
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to modify article category: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function remove ($articleCategoryId)
    {
        $resultSet = new ResultSet( );
        try
        {
            $result = $this->dbAdapter->query("DELETE article_category WHERE id = :id LIMIT 1;")->execute($args);
        } catch (\Exception $e) {
            throw new \Exception("Failed to remove article category: " . $e->getMessage( ));
        }
        return $resultSet;
    }
}