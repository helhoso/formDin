<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.3.1-alpha
 * FormDin Version: 4.5.1-alpha
 * 
 * System xx created in: 2019-04-14 20:35:32
 */


namespace Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class TipoAPI
{

    public function __construct()
    {
    }

    //--------------------------------------------------------------------------------
    public static function selectAll(Request $request, Response $response, array $args): Response
    {
        $result = \Tipo::selectAll();
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
        $result = \Tipo::selectById($id);
        $result = \ArrayHelper::convertArrayFormDin2Pdo($result);
        return $result;
    }

    //--------------------------------------------------------------------------------
    public static function selectById(Request $request, Response $response, array $args): Response
    {
        $result = self::selectByIdInside($args);
        $msg = array( 'qtd'=> \CountHelper::count($result)
                    , 'result'=>$result
        );
        $response = $response->withJson($msg);
        return $response;
    }

    //--------------------------------------------------------------------------------
    public static function save(Request $request, Response $response, array $args): Response
    {
        $vo = new \TipoVO;
        $msg = \Message::GENERIC_INSERT;
        if($request->isPut()){
            $msg = \Message::GENERIC_UPDATE;
            $result = self::selectByIdInside($args);
            $bodyRequest = $result[0];
            $vo = \FormDinHelper::setPropertyVo($bodyRequest,$vo);
        }
        $bodyRequest = json_decode($request->getBody(),true);
        $vo = \FormDinHelper::setPropertyVo($bodyRequest,$vo);

        $class = new \Tipo;
        $class->save($vo);

        $response = $response->withJson($msg);
        return $response;
    }

    //--------------------------------------------------------------------------------
    public static function delete(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        $class = new \Tipo;
        $result = $class->delete($id);
        $response = $response->withJson($msg);
        return $response;
    }
}