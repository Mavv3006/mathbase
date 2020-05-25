<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/models/User.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/auth/change_email.php');
    
    function changeData(){
        try {
            if ($auth->reconfirmPassword($_POST['password'])) {
                $auth->changeEmail("florian.goelz@putlicj.de", function ($selector, $token) {
                    echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email to the *new* address)';
                });
        
                echo 'The change will take effect as soon as the new email address has been confirmed';
            }
            else {
                echo 'We can\'t say if the user is who they claim to be';
            }
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Account not verified');
        }
        catch (\Delight\Auth\NotLoggedInException $e) {
            die('Not logged in');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }
?>