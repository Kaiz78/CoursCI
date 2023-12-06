<?php

// Scandir dossier file_postman
$files = scandir('file_postman');
// prend le dernier fichier
$lastFile = end($files);
// Récuperation du fichier json postman
$json = file_get_contents("file_postman/".$lastFile);
// Décodage du json
$data = json_decode($json, true);

$phpCode = var_export($data['item'], true);

if ( isset($_GET['file']) ) {
    // Afficher le code PHP pour copier coller le code dans la variable $testsScenarios
    echo "<pre>{$phpCode}</pre>";die;
}

// Structure de base pour les tests Postman
$testsData = array(
    "info" => array(
        "_postman_id" => "183494da-afcc-4576-9aa1-a9b56160a72d",
        "name" => "TEST AletWork",
        "schema" => "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
        "_exporter_id" => "13186043"
    ),
    "item" => array()
);

// Exemples de données pour les tests
$testsScenarios = array(
    array(
        "name" => "Test Login Success",
        "method" => "POST",
        "formdata" => array(
            array(
                "key" => "email",
                "value" => "test@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "test",
                "type" => "text"
            ),
        ),
        "url" => array(
            "raw" => "{{host}}/login",
            "host" => array("{{host}}"),
            "path" => array("login")
        ),
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ), 
        "name" => "Test Refresh",
        "method" => "GET",
        "formdata" => array(
            array(
                "key" => "email",
                "value" => "test@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "test",
                "type" => "text"
            ),
        ),
        "url" => array(
            "raw" => "{{host}}/refresh",
            "host" => array("{{host}}"),
            "path" => array("refresh")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ), 
        "name" => "Test Logout",
        "method" => "GET",
        "formdata" => array(
            array(
                "key" => "email",
                "value" => "test@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "test",
                "type" => "text"
            ),
        ),
        "url" => array(
            "raw" => "{{host}}/logout",
            "host" => array("{{host}}"),
            "path" => array("logout")
        )
    ),
    array(
        "name" => "Test Register",
        "method" => "POST",
        "formdata" => array(
            array(
                "key" => "name",
                "value" => "test2",
                "type" => "text"
            ),
            array(
                "key" => "password_confirmation",
                "value" => "test2",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "test2@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "test2",
                "type" => "text"
            ),
        ),
        "url" => array(
            "raw" => "{{host}}/register",
            "host" => array("{{host}}"),
            "path" => array("register")
        )
    ),
    array(
        "name" => "Test Verify Account",
        "method" => "GET",
        "formdata" => array(
            array(
                "key" => "token",
                "value" => "test@gmail.com",
                "type" => "text"
            ),
        ),
        "url" => array(
            "raw" => "{{host}}/verifyAccount?token=test",
            "host" => array("{{host}}"),
            "path" => array("verifyAccount?token=test")
        )
    ),
    array(
        "name" => "Test send mail new Password Forgot",
        "method" => "POST",
        "formdata" => array(
            array(
                "key" => "email",
                "value" => "test@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "test",
                "type" => "text"
            ),
        ),
        "url" => array(
            "raw" => "{{host}}/passwordForgot",
            "host" => array("{{host}}"),
            "path" => array("passwordForgot")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Teams",
        "method" => "GET",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/teams",
            "host" => array("{{host}}"),
            "path" => array("teams")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Teams",
        "method" => "post",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/teams",
            "host" => array("{{host}}"),
            "path" => array("teams")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Teams",
        "method" => "put",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/teams",
            "host" => array("{{host}}"),
            "path" => array("teams")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Teams Users",
        "method" => "get",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/teamsusers/1",
            "host" => array("{{host}}"),
            "path" => array("teams/1")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Teams users",
        "method" => "post",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/teamsUsers",
            "host" => array("{{host}}"),
            "path" => array("teamsUsers")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Teams Users",
        "method" => "put",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/teamsUsers",
            "host" => array("{{host}}"),
            "path" => array("teamsUsers")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Teams Users",
        "method" => "delete",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/teamsUsers",
            "host" => array("{{host}}"),
            "path" => array("teamsUsers")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Tasks",
        "method" => "get",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/task",
            "host" => array("{{host}}"),
            "path" => array("tasks")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Tasks",
        "method" => "post",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/task",
            "host" => array("{{host}}"),
            "path" => array("tasks")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Tasks",
        "method" => "put",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/task",
            "host" => array("{{host}}"),
            "path" => array("tasks")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Tasks",
        "method" => "delete",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/task",
            "host" => array("{{host}}"),
            "path" => array("tasks")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Tasks Comments",
        "method" => "get",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/taskComments/1",
            "host" => array("{{host}}"),
            "path" => array("taskComments/1")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Tasks Comments",
        "method" => "post",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/taskComments",
            "host" => array("{{host}}"),
            "path" => array("taskComments")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Tasks Comments",
        "method" => "put",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/taskComments",
            "host" => array("{{host}}"),
            "path" => array("taskComments")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Tasks Comments",
        "method" => "delete",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/taskComments",
            "host" => array("{{host}}"),
            "path" => array("taskComments")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Projects",
        "method" => "get",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/projects",
            "host" => array("{{host}}"),
            "path" => array("projects")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Projects",
        "method" => "post",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/projects",
            "host" => array("{{host}}"),
            "path" => array("projects")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Projects",
        "method" => "put",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/projects",
            "host" => array("{{host}}"),
            "path" => array("projects")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Projects",
        "method" => "delete",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/projects",
            "host" => array("{{host}}"),
            "path" => array("projects")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Milestone",
        "method" => "get",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/milestone",
            "host" => array("{{host}}"),
            "path" => array("milestone")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Milestone",
        "method" => "post",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/milestone",
            "host" => array("{{host}}"),
            "path" => array("milestone")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Milestone",
        "method" => "put",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/milestone",
            "host" => array("{{host}}"),
            "path" => array("milestone")
        )
    ),
    array(
        "auth" => array(
            "type" => "bearer",
            "bearer" => [
                array(
                    "key" => "token",
                    "value" => "{{token}}",
                    "type" => "string"
                ),
                array(
                    "key" => "undefined",
                    "type"=> "any"
                )
            ]
        ),      
        "name" => "Test Access Milestone",
        "method" => "delete",
        "formdata" => array(
            array(
                "key" => "firstname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "lastname",
                "value" => "jane_doe",
                "type" => "text"
            ),
            array(
                "key" => "email",
                "value" => "janedoe@gmail.com",
                "type" => "text"
            ),
            array(
                "key" => "password",
                "value" => "30test",
                "type" => "text"
            )
        ),
        "url" => array(
            "raw" => "{{host}}/milestone",
            "host" => array("{{host}}"),
            "path" => array("milestone")
        )
    ),
);


// Créer le tableau principal On parcour le tableau $testsScenario pour tester plusieurs parametres pour les requete POST | PUT | DELETE
$test_values = ["test", "'\"sls", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "1234589.S..?,;:", ",;; deùdle%", "test"];
$test_email_values = ["test@gmail.com", "'\"sls@gm.com", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa@gmail.com", "1234589.S..?,;:@mail.com", ",;; deùdle%@mail.fr", "test@gmail.com"];
// Ajout de nouveau test
foreach($testsScenarios as $keysa => $scenario){
    if(strtolower($scenario["method"]) == "post" || strtolower($scenario["method"]) == "put" || strtolower($scenario["method"]) == "delete"){
        // Si methode PUT ou DELETE on remplace formdata par raw json data
        if(strtolower($scenario["method"]) == "put" || strtolower($scenario["method"]) == "delete"){
            // recuperer le tableau formdata
            $formdata = $scenario["formdata"];
            // on recupere les clés du tableau formdata
            $keys = array_values($formdata);
            unset($scenario["formdata"]);
            $scenario["raw"] = "{\r\n";
            $i = 0;
            $count = count($keys);
            foreach($keys as $key){
                $count--;
                if($count != 0){
                    $scenario["raw"] .= "\"".$key["key"]."\":\"".$key["value"]."\"," . "\r\n";
                }else{
                    $scenario["raw"] .= "\"".$key["key"]."\":\"".$key["value"]."\"" . "\r\n";
                }
            }
            $scenario["raw"] .= "\r\n}";
        }
        $i = 0;
        if(strtolower($scenario["method"]) == "put" || strtolower($scenario["method"]) == "delete"){    
            // On copie chaque scénario pour chaque valeur de test
            foreach($test_values as $value){
                $i++;     
                $test = $scenario;
                $test["name"] = $scenario["name"] . " - " . $i;
                if(strtolower($scenario["method"]) == "put" || strtolower($scenario["method"]) == "delete"){
                    // convertir json in array
                    $raw = json_decode($scenario["raw"], true);
                    foreach($raw as $key => $json){
                        $raw[$key] = $value;
                    }
                    // convertir en json
                    $raw = json_encode($raw);
                    $scenario['raw'] = $raw;
                }else{
                    foreach($test["formdata"] as $key => $formdata){
                        $test["formdata"][$key]["value"] = $value;
                    }
                }
                $testsScenarios[] = $test;
            }
            // On supprime le tableau par défaut
            unset($testsScenarios[$keysa]);
        }
    }
}
// var_dump($testsScenarios);die;
// Créer les tests pour chaque scénario
foreach ($testsScenarios as $scenario) {
    if(strtolower($scenario["method"]) == "put" || strtolower($scenario["method"] == "delete")){
        // echo $scenario["raw"];
        $testItem = array(
            "name" => $scenario["name"],
            "request" => array(
                "auth" => isset($scenario["auth"]) ? $scenario["auth"] : array(),
                "method" => $scenario["method"],
                "body" => array(
                    "mode" => "raw",
                    "raw" => $scenario["raw"],
                    "options" => array("raw" => array("language" => "json"))
                ),
                "url" => $scenario["url"]
            ),
            "response" => array()
        );
    }else{
        $testItem = array(
            "name" => $scenario["name"],
            "request" => array(
                "auth" => isset($scenario["auth"]) ? $scenario["auth"] : array(),
                "method" => $scenario["method"],
                "body" => array(
                    "mode" => "formdata",
                    "formdata" => $scenario["formdata"]
                ),
                "url" => $scenario["url"]
            ),
            "response" => array()
        );
    }

    if($scenario["name"] == "Test Login Success" || $scenario["name"] == "Test Refresh"){
        $testItem["event"] = array(
            array(
                "listen" => "test",
                "script" => array(
                    "exec" => array(
                            "pm.test(\"Vérification des codes d'erreur\", function () {\r",
                                "// Récupérer le code de réponse\r",
                                "var responseCode = pm.response.code;\r",
                                "// Vérifier si le code de réponse est 500 ou 405 et déclencher une erreur si c'est le cas\r",
                                "if (responseCode === 500 || responseCode === 405) {\r",
                                    "pm.expect.fail(\"La réponse contient un code d'erreur : \" + responseCode);\r",
                                "}\r",
                            "});\r",

                            // Récupere le token 
                            "pm.test(\"Récupération du token\", function () {\r",
                                "// Convertir la réponse en JSON\r",
                                "var responseBody = pm.response.json();\r",
                            
                                "// Vérifier si la réponse contient un token\r", 
                                "if (responseBody.access_token) {\r",
                                    "// Stocker le token dans une variable\r", 
                                    "pm.environment.set(\"token\", responseBody.access_token);\r",
                                "} else {\r",
                                    "console.log(\"Aucun token\")\r",
                                    "pm.environment.set(\"token\", \"Auncun token\");\r",
                            
                                "}\r",
                            "});\r",
                    ),
                    "type" => "text/javascript"
                )
            )
        );        
    }else{
        // Ajouter le test pour chaque scénario
        $testItem["event"] = array(
            array(
                "listen" => "test",
                "script" => array(
                    "exec" => array(
                            "pm.test(\"Vérification des codes d'erreur\", function () {\r",
                                "// Récupérer le code de réponse\r",
                                "var responseCode = pm.response.code;\r",
                                "// Vérifier si le code de réponse est 500 ou 405 et déclencher une erreur si c'est le cas\r",
                                "if (responseCode === 500 || responseCode === 405) {\r",
                                    "pm.expect.fail(\"La réponse contient un code d'erreur : \" + responseCode);\r",
                                "}\r",
                            "});\r",
               
                            
                    ),
                    "type" => "text/javascript"
                )
            )
        );
    }

    // Ajouter le test au tableau principal
    $testsData["item"][] = $testItem;
}

// Convertir le tableau associatif en format JSON
$jsonData = json_encode($testsData, JSON_PRETTY_PRINT);

// Écrire le contenu JSON dans un fichier
file_put_contents('tests_postman.json', $jsonData);

echo "Le fichier JSON pour les tests Postman avec plusieurs scénarios a été généré avec succès !";
?>
