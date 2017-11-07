<?php
/**
 * Created by PhpStorm.
 * User: wahid.sadique
 * Date: 10/25/2017
 * Time: 3:45 PM
 */

require_once 'model/Crud.php';
require_once 'utils/Redirect.php';

if (isset($_GET['clientId'])) {
    $db = new Crud();
    $clientId = $_GET['clientId'];
    $branches = $db->getClientsBranches($clientId);
    if ($branches != null) {
        $branchList = array();
        $i = 0;
        while ($row = $branches->fetch_assoc()) {
            $branchList[$i] = $row;
            $i++;
        }
        echo json_encode($branchList);
    } else {
        Redirect::loadPage("login.php");
        exit();
    }
} else {
    Redirect::loadPage("login.php");
    exit();
}
