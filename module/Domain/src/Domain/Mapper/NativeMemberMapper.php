<?php

namespace Domain\Mapper;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\AdapterInterface;

class NativeMemberMapper
extends DomainMapper
implements MemberMapper
{
    public function __construct (AdapterInterface $dbAdapter)
    {
        parent::__construct($dbAdapter);
    }

    public function getById ($memberId)
    {
        $resultSet = new ResultSet( );
        try
        {
            $result = $this
                ->dbAdapter
                    ->query("SELECT id, email_address, name_first, name_last FROM member WHERE member.id = ? LIMIT 1;")
                        ->execute(array ($memberId));
            $resultSet->initialize($result);    
        } catch (\Exception $e) {
            throw new \Exception("Failed to fetch member by id: " . $e->getMessage( ));
        }
        return $resultSet;
    }

    public function authenticate ($username, $passwordHash)
    {
        $resultSet = new ResultSet( );

        try
        {
            $result = $this
                ->dbAdapter
                    ->query("SELECT id, password_hash FROM member WHERE UPPER(member.email_address) = UPPER(?) LIMIT 1;")
                        ->execute(array($username));
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to authenticate member: " . $e->getMessage( ));
        }

        foreach ($resultSet as $row)
        {
            $memberId = $row['id'];
            $storedHash = $row['password_hash'];
        }

        if (isset($memberId) && !empty($memberId))
        {
            if (password_verify($passwordHash, $storedHash))
            {
                return $memberId;
            } else {
                throw new \Exception("Wrong password.");
            }   
        } else {
            throw new \Exception("Wrong username.");
        }
    }

    public function grantPermission ($memberId, $permissionId)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented");
    }

    public function revokePermission ($memberId, $permissionId)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented");
    }

    public function add ($args)
    {
        //$resultSet = new ResultSet( );
        try
        {
            $result = $this
                ->dbAdapter
                    ->query("INSERT INTO member (email_address, password_hash, name_first, name_last) VALUES (?, ?, ?, ?);")
                        ->execute($args)
            ;
            //$resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to add member: " . $e->getMessage( ));
        }

        $resultSet = new ResultSet( );
        $result = $this
            ->dbAdapter
                ->query("SELECT LAST_INSERT_ID( ) AS id;")
                    ->execute( )
        ;
        $resultSet->initialize($result);
        return $resultSet;
    }

    public function remove ($memberId)
    {
        $resultSet = new ResultSet( );
        try
        {
            $result = $this
                ->dbAdapter
                    ->query("DELETE member WHERE member.id = ? LIMIT 1;")
                        ->execute(array ($memberId))
            ;
            $resultSet->initialize($result);
        } catch (\Exception $e) {
            throw new \Exception("Failed to remove member: " . $e->getMessage( ));
        }
        return $resultSet;
    }
}