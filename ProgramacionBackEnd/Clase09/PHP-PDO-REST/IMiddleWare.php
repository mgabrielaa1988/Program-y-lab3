<?php

interface IMiddleWare{
    public static function VerificarUsuario($request,$response,$next);
}