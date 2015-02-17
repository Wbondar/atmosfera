<?php

namespace Domain\Mapper;

use Zend\Db\Adapter\AdapterInterface;

class NativeArticleCategoryMapper
extends DomainMapper
implements ArticleCategoryMapper
{
    public function __construct (AdapterInterface $dbAdapter)
    {
        parent::__construct($dbAdapter);
    }

    public function getChildren ($articleCategoryId)
    {
        $result = $this->dbAdapter->query("SELECT id, title, parent_id FROM article_category AS db WHERE db.parent_id = ?;")->execute(array($articleCategoryId));
        foreach ($result as $row)
        {
            array_push($result, this.getChildren($row['id']));
        }

        return $result;
    }

    public function getById ($articleCategoryId)
    {
        throw new Exception ("This function is yet to be implemented.");
    }

    public function getByTitle ($articleCategoryTitle)
    {
        throw new Exception ("This funciton is yet to be implemented.");
    }
}