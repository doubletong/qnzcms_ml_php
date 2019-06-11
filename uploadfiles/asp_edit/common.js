/**
 * ȥ���ַ�����β���ַ���
 *
 * @param   string  sInput  ��Ҫȥ����β���ַ����ַ�����
 * @return  string  ����ȥ����β���ַ����ַ�����
 */
function _GetTrimStr(sInput) 
{
    var sOutput;

    if (typeof (sInput) != "string")
        return false;

    sOutput = sInput.replace (/^(\s+)/, "");     //ȥ����߿��ַ�
    sOutput = sOutput.replace (/(\s+)$/, "");   //ȥ���ұ߿��ַ�

    return sOutput;
}   //end function _GetTrimStr


/**
 * ����Ƿ�Ϊ���֣�����С����
 *  
 * @param   string  sInput      ��Ҫ�����ַ�����
 * @param   boolean bCanBeNull  �������ַ����Ƿ�����Ϊ�գ�Ĭ��ֵΪ false��������Ϊ�գ���
 * @return  boolean ������������ true�����򷵻� false��
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
 * ����Ƿ�Ϊ������
 *      
 * @param   string  sInput      ��Ҫ�����ַ�����
 * @param   boolean bCanBeNull  �������ַ����Ƿ�����Ϊ�գ�Ĭ��ֵΪ false��������Ϊ�գ���
 * @return  boolean ������������ true�����򷵻� false��
 */
function _IsInteger(sInput, bCanBeNull) 
{
    var reExp=/[.]/g;

    if (_IsNumber(sInput, bCanBeNull) == false)    //���ú��� _IsNumber() �ж��ַ����Ƿ�Ϊ����
        return false;

    if (reExp.exec (sInput))
        return false;
    else
        return true;
}   //end function _IsInteger


/**
 * ����ַ����Ƿ�Ϊ��ĸ������(����������)����ϡ�
 * 
 * @param   string  sInput      ��Ҫ�����ַ�����
 * @param   boolean bCanBeNull  �������ַ����Ƿ�����Ϊ�գ�Ĭ��ֵΪ false��������Ϊ�գ���
 * @return  boolean ������������ true�����򷵻� false��
 */
function _IsLetterNum(sInput, bCanBeNull) 
{
    var reExp=/[^A-Za-z0-9]/g;      //���ҷ���ĸ�������ַ���������ʽ
    
    if (!bCanBeNull && !sInput)
        return false;

    if (reExp.exec (sInput))
        return false;
    else
        return true;
}   //end funciton _IsLetterNum


/**
 * ����ַ����Ƿ�Ϸ����Ƿ��У����´���ģ������ַ���Ϊ���Ϸ���
 *        
 * @param   string  sInput      ��Ҫ�����ַ�����
 * @param   boolean bCanBeNull  �������ַ����Ƿ�����Ϊ�գ�Ĭ��ֵΪ false��������Ϊ�գ���
 * @return  boolean ������������ true�����򷵻� false��
 */ 
function _IsChrValid(sInput, bCanBeNull) 
{
    var reExp=/[\'\"\/\\]/g;    //���������ַ���������ʽ
    
    if (!_GetTrimStr(sInput)) {
        if (!bCanBeNull)    //������Ϊ�յ����
            return false;
        if (bCanBeNull)     //����Ϊ�յ����
            return true;    
    } else {
        if (reExp.test(sInput))
            return false;
        else
            return true;
    }
}   //end function _IsChrValid


/**
 * ����ַ����Ƿ�Ϸ����ڣ���ʽΪ��YYY-MM-DD���磺2002-07-07��
 * 
 * @param   string  sInput      ��Ҫ�����ַ�����
 * @return  boolean ������������ true�����򷵻� false��
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
 * ���EMAIL��ַ�Ƿ�Ϸ�
 * 
 * @param   string  sInput      ��Ҫ�����ַ�����
 * @return  boolean ������������ true�����򷵻� false��
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
 * ֻ�����뺺��
 * 
 * method ����<input onkeypress="onlychinese()">
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
 * ���´���
 * 
 * @param   string   loadpos     �´��ڵ�ַ��
 * @param   Integer  sWidth      �´��ڿ�ȡ�
 * @param   Integer  sHeight     �´��ڸ߶ȡ�
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
 * ����Ƿ�Ϊ�绰���������
 * 
 * @param   string  sInput      ��Ҫ�����ַ�����
 * @return  boolean ������������ true�����򷵻� false��
 */ 
function _IsCheckTel(sInput)
{
    var i,j,strTemp;
    strTemp="0123456789-()# ";
    for (i=0;i<sInput.length;i++)
    {
        j=strTemp.indexOf(sInput.charAt(i)); 
        if (j==-1)
        {//˵�����ַ����Ϸ�
            return false;			
        }
    }
    //˵���Ϸ�
    return true;
}
function searchstr() 
{
var f = document.search;
if (!f.serstring.value.length )
{
    alert("�����������ʣ�");
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