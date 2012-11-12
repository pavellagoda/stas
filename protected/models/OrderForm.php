<?php

class OrderForm extends CFormModel
{

    public $username;
    public $email;
    public $telephone;
    public $comment;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            array('username, telephone', 'required', 'message' => "{attribute} не может быть пустым"),
            array('email', 'email', 'message' => 'Введите корректный email'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'username' => 'ФИО:',
            'email' => 'E-mail:',
            'telephone' => 'Контактный телефон:',
            'comment' => 'Комментарий к заказу:'
        );
    }

}
