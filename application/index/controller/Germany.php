<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016/10/14
 * Time: 10:21
 */

namespace app\index\controller;


use app\common\controller\Fornt;
use app\common\model\Category;
use app\common\model\Document;

class Germany extends Fornt
{
    public function index(){

        return $this->fetch();
    }

    public function getList($type = '',$cate = '',$keyWord = ''){
        if($cate){
           $where['category'] = ['=',$cate];
        }
        if($keyWord){
            $where['title'] = ['like','%'.$keyWord .'%'];
        }
        $where['tags'] = ['=',$type];
        $info = db('Document_article')->where($where)->select();
        $categories = db('Document_article')->field('category')->select();
        $this->assign('type',$type);
        $this->assign('categories',$categories);
        $this->assign('info',$info);
        return $this->fetch();
    }


    public function getDetail($id){
        $data = db('Document_article')->where('doc_id',$id)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }

}