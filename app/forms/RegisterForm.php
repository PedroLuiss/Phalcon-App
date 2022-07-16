<?php
namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
// Validation
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Email;

class RegisterForm extends Form
{
    public function initialize()
    {
        /**
         * Name
         */
        $name = new Text('name', [
            "class" => "form-control",
            "placeholder" => "Ingresas un nombre completo"
        ]);

        // form name field validation
        $name->addValidator(
            new PresenceOf(['message' => 'El nombre es requerido'])
        );

        /**
         * Email Address
         */
        $email = new Text('email', [
            "class" => "form-control",
            "placeholder" => "Enter Email Address"
        ]);

        // form email field validation
        $email->addValidators([
            new PresenceOf(['message' => 'El email es requerido']),
            new Email(['message' => 'El email es invalido']),
        ]);

        /**
         * New Password
         */
        $password = new Password('password', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => ""
        ]);

        $password->addValidators([
            new PresenceOf(['message' => 'Password es requerido']),
            new StringLength(['min' => 5, 'message' => 'El password debe contener minimo 5 caracteres.']),
            new Confirmation(['with' => 'password_confirm', 'message' => 'El passwor no son iguales.']),
        ]);


        /**
         * Confirm Password
         */
        $passwordNewConfirm = new Password('password_confirm', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "Confirm Password"
        ]);

        $passwordNewConfirm->addValidators([
            new PresenceOf(['message' => 'El comfirmar password es requerido']),
        ]);


        /**
         * Submit Button
         */
        $submit = new Submit('submit', [
            "value" => "Registrar",
            "class" => "btn btn-primary",
        ]);

        $this->add($name);
        $this->add($email);
        $this->add($password);
        $this->add($passwordNewConfirm);
        $this->add($submit);
    }
}