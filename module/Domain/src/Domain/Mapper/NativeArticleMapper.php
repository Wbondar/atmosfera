<?php

namespace Domain\Mapper;

use Zend\Db\Adapter\AdapterInterface;

class NativeArticleMapper
extends DomainMapper
implements ArticleMapper
{
    public function __construct (AdapterInterface $dbAdapter)
    {
        parent::__construct($dbAdapter);
    }
    
	public function getAll( )
	{
		return $this->dbAdapter->query("SELECT id, title, category_id, content FROM article;")->execute( );
	}

	public function getAllActual ( )
	{
		return $this->dbAdapter->query("SELECT id, title, category_id, content FROM article AS db WHERE NOW( ) < db.published_at;")->execute( );
	}

	public function getById ($articleId)
	{
		return $this->dbAdapter->query("SELECT id, title, category_id, content FROM article AS db WHERE db.id = ? LIMIT 1;")->execute(array($articleId));
	}

	public function getByTitle ($articleTitle)
	{
		$articleTitle = trim($articleTitle);
		return $this->dbAdapter->query("SELECT id, title, category_id, content FROM article AS db WHERE UPPER(db.title) = UPPER(?) LIMIT 1;")->execute(array($articleTitle));
	}

	public function add ($args)
	{

	}

	public function modify ($args)
	{

	}

	public function remove ($articleId)
	{

	}
}