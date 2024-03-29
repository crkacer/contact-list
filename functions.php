<?php
/**
 * Created by PhpStorm.
 * User: MGXA2
 * Date: 10/26/17
 * Time: 4:09 PM
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const FILE_NAME = "contact.txt";
define('SITE_ROOT', realpath(dirname(__FILE__)));


function readRecords()
{
    if (!file_exists(FILE_NAME)) {
        touch(FILE_NAME);
        $file = fopen(FILE_NAME, 'r+');
        file_put_contents(FILE_NAME, serialize([]));
        fclose($file);
        return [];

    } else {
        $file = fopen(FILE_NAME, 'r+');
        $content = fread($file, filesize(FILE_NAME));

        if ($file) {
            $arrData = unserialize($content);
            fclose($file);
            return $arrData;
        }
    }
}

function writeRecords($data)
{

    if (!file_exists(FILE_NAME)) {
        touch(FILE_NAME);
        $file = fopen(FILE_NAME, 'r+');
        if ($file) {

            $arrContact = [];
            array_push($arrContact, [
                'id' => $data['id'],
                'location' => (isset($data['location']) ? $data['location'] : ''),
                'title' => $data['title'],
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'site' => $data['site'],
                'cell' => $data['cell'],
                'home' => $data['home'],
                'office' => $data['office'],
                'twitter' => $data['twitter'],
                'facebook' => $data['facebook'],
                'comment' => $data['comment']
            ]);

            file_put_contents(FILE_NAME, serialize($arrContact));

            fclose($file);
            return true;
        }

    } else {
        $file = fopen(FILE_NAME, 'r+');
        $content = fread($file, filesize(FILE_NAME));

        if ($file) {

            $arrContact = unserialize($content);
            if (count($arrContact) == 0) {
                $arrContact = [];
            }
            array_push($arrContact, [
                'id' => $data['id'],
                'location' => (isset($data['location']) ? $data['location'] : ''),
                'title' => $data['title'],
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'site' => $data['site'],
                'cell' => $data['cell'],
                'home' => $data['home'],
                'office' => $data['office'],
                'twitter' => $data['twitter'],
                'facebook' => $data['facebook'],
                'comment' => $data['comment']
            ]);

            file_put_contents(FILE_NAME, serialize($arrContact));
            fclose($file);
            return true;
        }
    }
    return false;

}

function updateRecords($data)
{
    if (!file_exists(FILE_NAME)) {
        return false;

    } else {
        $file = fopen(FILE_NAME, 'r+'); // handle is resource of steam
        $content = fread($file, filesize(FILE_NAME)); // id is content of the file

        if ($file) {

            $arrContact = unserialize($content);
            $k = $data['position'];
            $arrContact[$k]['location'] = (isset($data['location']) ? $data['location'] : $arrContact[$k]['location']);
            $arrContact[$k]['fname'] = (isset($data['fname']) ? $data['fname'] : $arrContact[$k]['fname']);
            $arrContact[$k]['lname'] = (isset($data['lname']) ? $data['lname'] : $arrContact[$k]['lname']);
            $arrContact[$k]['email'] = (isset($data['email']) ? $data['email'] : $arrContact[$k]['email']);
            $arrContact[$k]['title'] = (isset($data['title']) ? $data['title'] : $arrContact[$k]['title']);
            $arrContact[$k]['site'] = (isset($data['site']) ? $data['site'] : $arrContact[$k]['site']);
            $arrContact[$k]['cell'] = (isset($data['cell']) ? $data['cell'] : $arrContact[$k]['cell']);
            $arrContact[$k]['home'] = (isset($data['home']) ? $data['home'] : $arrContact[$k]['home']);
            $arrContact[$k]['office'] = (isset($data['office']) ? $data['office'] : $arrContact[$k]['office']);
            $arrContact[$k]['twitter'] = (isset($data['twitter']) ? $data['twitter'] : $arrContact[$k]['twitter']);
            $arrContact[$k]['facebook'] = (isset($data['facebook']) ? $data['facebook'] : $arrContact[$k]['facebook']);
            $arrContact[$k]['comment'] = (isset($data['comment']) ? $data['comment'] : $arrContact[$k]['comment']);

            file_put_contents(FILE_NAME, serialize($arrContact));
            fclose($file);
            header("Refresh:0");
            return true;
        }
    }
}

function uploadImage($dir, $file)
{

    $target_dir = $dir . "/";
    $target_file = $target_dir . basename($_FILES[$file]["name"]);

    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if file already exists
    if (file_exists($target_file)) {
        unlink($target_file);
        // $uploadOk = 0;
    }

    // Allow certain file formats
    $uploadOk = 1;
    if ($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "ico") {

        echo "Sorry, only PNG, JPG, JPEG, ICO files are allowed.";

        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES[$file]["name"]). " has been uploaded.";
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    return false;

}

function deleteRecords($data)
{
    if (!file_exists(FILE_NAME)) {
        return false;

    } else {
        $file = fopen(FILE_NAME, 'r+'); // handle is resource of steam
        $content = fread($file, filesize(FILE_NAME)); // id is content of the file

        if ($file) {

            $arrContact = unserialize($content);
            $k = $data['position'];
            unset($arrContact[$k]);
            $foo = array_values($arrContact);

            file_put_contents(FILE_NAME, serialize($foo));
            fclose($file);
            return true;
        }
        return false;
    }
}