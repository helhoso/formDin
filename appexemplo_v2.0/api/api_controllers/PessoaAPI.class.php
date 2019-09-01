<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.9.0-alpha
 * FormDin Version: 4.7.5-alpha
 * 
 * System appev2 created in: 2019-09-01 16:03:51
 */

namespace api_controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PessoaAPI
{

    public function __construct()
    {
    }

    //--------------------------------------------------------------------------------
    public static function selectAll(Request $request, Response $response, array $args)
    {
        $controller = new \Pessoa();
        $result = $controller->selectAll();
        $result = \ArrayHelper::convertArrayFormDin2Pdo($result);
        $msg = array( 'qtd'=> \CountHelper::count($result)
                    , 'result'=>$result
        );
        $response = $response->withJson($msg);
        return $response;
    }

    //--------------------------------------------------------------------------------
    private static function selectByIdInside(array $args)
    {
        $id = $args['id'];
        $controller = new \Pessoa();
        $result = $controller->selectById($id);
        $result = \ArrayHelper::convertArrayFormDin2Pdo($result);
        return $result;
    }

    //--------------------------------------------------------------------------------
    public static function selectById(Request $request, Response $response, array $args)
    {
        $result = self::selectByIdInside($args);
        $msg = array( 'qtd'=> \CountHelper::count($result)
                    , 'result'=>$result
        );
        $response = $response->withJson($msg);
        return $response;
    }

    //--------------------------------------------------------------------------------
    public static function save(Request $request, Response $response, array $args)
    {
        $vo = new \PessoaVO;
        $msg = \Message::GENERIC_INSERT;
        if($request->isPut()){
            $msg = \Message::GENERIC_UPDATE;
            $result = self::selectByIdInside($args);
            $bodyRequest = $result[0];
            $vo = \FormDinHelper::setPropertyVo($bodyRequest,$vo);
        }
        $bodyRequest = json_decode($request->getBody(),true);
        $vo = \FormDinHelper::setPropertyVo($bodyRequest,$vo);

        $controller = new \Pessoa;
        $controller->save($vo);

        $response = $response->withJson($msg);
        return $response;
    }

    //--------------------------------------------------------------------------------
    public static function delete(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $controller = new \Pessoa;
        $msg = $controller->delete($id);
        $response = $response->withJson($msg);
        return $response;
    }
}