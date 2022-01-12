<?php

namespace CRUD\Controller;

use CRUD\Helper\DBConnector;
use CRUD\Helper\PersonHelper;
use CRUD\Model\Actions;


class PersonController
{

    private PersonHelper $helper;

    /**
     * @param DBConnector $db
     */
    public function __construct(DBConnector $db)
    {
        $this->helper = new PersonHelper($db);
    }
    public function switcher($pathVar,$request)
    {
        switch ($pathVar)
        {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction();
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }
    }

    public function createAction($request)
    {
        $firstname = $request['firstName'];
        $lastname = $request['lastName'];
        $username = $request['username'];
        if ($this->helper->insert($firstname, $lastname, $username))
            echo "person inserted successfully";
        else
            echo "error";
        $this->helper->closeConnection();
    }

    public function updateAction($request)
    {
        $firstname = $request['firstName'];
        $lastname = $request['lastName'];
        $username = $request['username'];
        if ($this->helper->update($firstname, $lastname, $username))
            echo 'person updated successfully';
        else
            echo 'error';
    }

    public function readAction($request)
    {
        $id = $request['id'];
        if (!empty($id)) {
            $result = $this->helper->fetch($id);
            if ($result != null)
                echo $result;
            else
                echo 'error';
        } else
            echo 'enter a id';
        $this->helper->closeConnection();
    }

    public function readAllAction()
    {
        $result = $this->helper->fetchAll();
        if ($result != null)
            echo $result;
        else
            echo 'error';
        $this->helper->closeConnection();
    }

    public function deleteAction($request)
    {
        $username = $request['username'];
        if ($this->helper->delete($username))
            echo 'person deleted successfully';
        else
            echo 'error';
    }

}