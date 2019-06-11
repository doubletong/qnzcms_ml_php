/**
 * 去掉字符串首尾空字符。
 *
 * @param   string  sInput  需要去掉首尾空字符的字符串。
 * @return  string  返回去掉首尾空字符的字符串。
 */
function _GetTrimStr(sInput) 
{
    var sOutput;

    if (typeof (sInput) != "string")
        return false;

    sOutput = sInput.replace (/^(\s+)/, "");     //去掉左边空字符
    sOutput = sOutput.replace (/(\s+)$/, "");   //去掉右边空字符

    return sOutput;
}   //end function _GetTrimStr


/**
 * 检测是否为数字，包括小数。
 *  
 * @param   string  sInput      需要检测的字符串。
 * @param   boolean bCanBeNull  被检测的字符串是否允许为空，默认值为 false（不允许为空）。
 * @return  boolean 符号条件返回 true，否则返回 false。
 */
function _IsNumber(sInput, bCanBeNull) 
{
    if (!bCanBeNull && !sInput)
        return false;

    if (isNaN(sInput))
        return false;
    else
        return true;
}   //end function _IsNumber


/**
 * 检测是否为整数。
 *      
 * @param   string  sInput      需要检测的字符串。
 * @param   boolean bCanBeNull  被检测的字符串是否允许为空，默认值为 false（不允许为空）。
 * @return  boolean 符号条件返回 true，否则返回 false。
 */
function _IsInteger(sInput, bCanBeNull) 
{
    var reExp=/[.]/g;

    if (_IsNumber(sInput, bCanBeNull) == false)    //调用函数 _IsNumber() 判断字符串是否为数字
        return false;

    if (reExp.exec (sInput))
        return false;
    else
        return true;
}   //end function _IsInteger


/**
 * 检测字符串是否为字母、数字(不包括中文)的组合。
 * 
 * @param   string  sInput      需要检测的字符串。
 * @param   boolean bCanBeNull  被检测的字符串是否允许为空，默认值为 false（不允许为空）。
 * @return  boolean 符号条件返回 true，否则返回 false。
 */
function _IsLetterNum(sInput, bCanBeNull) 
{
    var reExp=/[^A-Za-z0-9]/g;      //查找非字母、数字字符的正则表达式
    
    if (!bCanBeNull && !sInput)
        return false;

    if (reExp.exec (sInput))
        return false;
    else
        return true;
}   //end funciton _IsLetterNum


/**
 * 检测字符串是否合法，是否含有（导致错误的）特殊字符即为不合法。
 *        
 * @param   string  sInput      需要检测的字符串。
 * @param   boolean bCanBeNull  被检测的字符串是否允许为空，默认值为 false（不允许为空）。
 * @return  boolean 符号条件返回 true，否则返回 false。
 */ 
function _IsChrValid(sInput, bCanBeNull) 
{
    var reExp=/[\'\"\/\\]/g;    //查找特殊字符的正则表达式
    
    if (!_GetTrimStr(sInput)) {
        if (!bCanBeNull)    //不允许为空的情况
            return false;
        if (bCanBeNull)     //允许为空的情况
            return true;    
    } else {
        if (reExp.test(sInput))
            return false;
        else
            return true;
    }
}   //end function _IsChrValid


/**
 * 检测字符串是否合法日期，格式为：YYY-MM-DD，如：2002-07-07。
 * 
 * @param   string  sInput      需要检测的字符串。
 * @return  boolean 符号条件返回 true，否则返回 false。
 */ 
function _IsDateValid(sInput)
{
    var reExp=/^(19|20)\d{2}[\-](0[1-9]|1[0-2])[\-](0[1-9]|[12][0-9]|3[01])$/;

    if (reExp.exec(sInput))
        return true;
    else
        return false;

}   //end function _IsDateValid


/**
 * 检测EMAIL地址是否合法
 * 
 * @param   string  sInput      需要检测的字符串。
 * @return  boolean 符号条件返回 true，否则返回 false。
 */ 
function _IsEmailValid(sInput)
{
    var sFilter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    if (sFilter.test(sInput)) 
        return true;
    else 
        return false;
}   //end function _IsEmailValid

/**
 * 只能输入汉字
 * 
 * method 例如<input onkeypress="onlychinese()">
 * @return  void
 */ 
function onlychinese() 
{
    if ((window.event.keyCode >=32) && (window.event.keyCode <= 126)) 
    {
         window.event.keyCode = 0 ;
    }
} //end function onlychinese

/**
 * 打开新窗口
 * 
 * @param   string   loadpos     新窗口地址。
 * @param   Integer  sWidth      新窗口宽度。
 * @param   Integer  sHeight     新窗口高度。
 * @return  void
 */ 
var newWindow = null
function windowOpener(loadpos,sWidth,sHeight)
{       
    if (!sWidth)
    {
		sWidth = 400;
    }
	if(!sHeight)
	{
		sHeight = 300;
	}
	if (! newWindow || newWindow.closed)
    {
        newWindow = window.open(loadpos,"surveywin","toolbar,resizable,scrollbars,dependent,width="+sWidth+",height="+sHeight);
    }else
    {
        newWindow.focus();
    }
}//end function windowOpener

/**
 * 检查是否为电话、传真号码
 * 
 * @param   string  sInput      需要检测的字符串。
 * @return  boolean 符号条件返回 true，否则返回 false。
 */ 
function _IsCheckTel(sInput)
{
    var i,j,strTemp;
    strTemp="0123456789-()# ";
    for (i=0;i<sInput.length;i++)
    {
        j=strTemp.indexOf(sInput.charAt(i)); 
        if (j==-1)
        {//说明有字符不合法
            return false;			
        }
    }
    //说明合法
    return true;
}
function searchstr() 
{
var f = document.search;
if (!f.serstring.value.length )
{
    alert("请输入搜索词！");
    f.serstring.focus();
    return false;
}
else
    f.submit()
}
function fontZoom(size)
{
 document.getElementById('fontzoom').style.fontSize=size+'pt';
}