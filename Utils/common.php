<?php 
namespace QNZ\Utils;


class Common
{

    //面包屑导航 首页 > 手机类型 > CDMA手机 >诺基亚N9
    function breadcrumb(array $arr,$id) {

        $tree = array();    

        foreach($arr as $v) {
            if($v['id'] == $id) {// 判断要不要找父栏目
                if($v['parent'] > 0) { // parnet>0,说明有父栏目
                    $tree = array_merge($tree,$this->breadcrumb($arr,$v['parent']));
                }

                $tree[] = $v; // 以找到上地为例
            }
        }

        return $tree;

    }

    //构建树形导航
    function buildMenuTree(array $elements, $parentId = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent'] == $parentId) {
                $children = $this->buildMenuTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
    
    


}