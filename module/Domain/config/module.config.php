<?php

return array 
(
    'service_manager' => array
    (
        'factories' => array
        (
              'Zend\Db\Adapter\Adapter'               => 'Zend\Db\Adapter\AdapterServiceFactory'
            , 'Domain\Mapper\ArticleMapper'           => 'Domain\Factory\ArticleMapperFactory'
            , 'Domain\Mapper\ArticleCategoryMapper'   => 'Domain\Factory\ArticleCategoryMapperFactory'
            , 'Domain\Mapper\MemberMapper'            => 'Domain\Factory\MemberMapperFactory'
            , 'Domain\Service\ArticleService'         => 'Domain\Factory\ArticleServiceFactory'
            , 'Domain\Service\ArticleCategoryService' => 'Domain\Factory\ArticleCategoryServiceFactory'
            , 'Domain\Service\MemberService'          => 'Domain\Factory\MemberServiceFactory'
        )
    )
)
;