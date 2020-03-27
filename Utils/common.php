<?php
namespace QNZ\Utils;

class Common
{

    //面包屑导航 首页 > 手机类型 > CDMA手机 >诺基亚N9
    public function breadcrumb(array $arr, $id)
    {

        $tree = array();

        foreach ($arr as $v) {
            if ($v['id'] == $id) { // 判断要不要找父栏目
                if ($v['parent'] > 0) { // parnet>0,说明有父栏目
                    $tree = array_merge($tree, $this->breadcrumb($arr, $v['parent']));
                }

                $tree[] = $v; // 以找到上地为例
            }
        }

        return $tree;

    }

    //构建树形导航
    public function buildMenuTree(array $elements, $parentId = 0)
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

    // select 查询数据结果集 纵向数组横向排
    public function aryy_x($ary)
    {
        $ary2 = array(); //返回数组
        $column = array();
        foreach ($ary[0] as $k => $v) {
            $column[] = $k; //字段名
        }
        $arylength = count($ary); //总公多少数据
        $columnlength = count($column); //总公多少字段
        for ($i = 0; $i < $columnlength; $i++) {
            $value = array();
            for ($j = 0; $j < $arylength; $j++) {
                $value[] = $ary[$j][$column[$i]]; //竖排集合
            }
            $ary2[$column[$i]] = $value; //竖排集合 -- 以列名 作为键值
        }
        return $ary2;
    }

   
}
