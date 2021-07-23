//获取元素方法
function $(string){
    var tag=string.charAt(0);
    var ele=null;
    switch(tag){
        case ".":
            ele=document.getElementsByClassName(string.slice(1))
            break;
        case "#":
            ele=document.getElementById(string.slice(1))
            break;
        default:
            ele=document.getElementsByTagName(string);
            break;
    }
    return  ele;
}
//创建背景方法
function createBg(parent,col,row){
    //创建表格
    parent.style.width=row*50+"px";
    parent.style.height=col*50+"px";
    for (var i = 0; i < row; i++) {
        for (var j = 0; j < col; j++) {
            var  div =document.createElement('div')
            div.style.width="48px"
            div.style.height="48px"
            div.style.border="1px solid white"
            div.style.float='left'
            parent.appendChild(div);
        }
    }
}

//事件监听
function createKeyEvent(head){
    document.onkeyup=function(event){
        console.log(event)
        var event=event||window.event
        var key=event.keyCode;
        if (head.className=='top'&&key==40) {
            return;
        }
        else if (head.className=='right'&&key==37) {

            return;
        }
        else if (head.className=='down'&&key==38) {
            return;
        }
        else if (head.className=='left'&&key==39) {
            return;
        }
        switch(key){
            case 40:
                head.className='down'
                break;
            case 37:
                head.className="left"
                break;
            case 38:
                head.className="top"
                break;
            case 39:
                head.className="right"
                break;
        }
    }
}

//身体碰撞检测
function checkbody(obj1,arr) {
    for (var i = 1; i < arr.length; i++) {
        if (obj1.offsetTop==arr[i].offsetTop&&obj1.offsetLeft==arr[i].offsetLeft) {
            return false;
        }
    }
}




//碰撞检测
function check(obj1,obj2){
    if (obj1.offsetLeft==obj2.offsetLeft&&obj1.offsetTop==obj2.offsetTop) {
        return true;
    }
    return false;
}
//头部移动
function moveHead(head){
    var left=0;
    var top=0;
    switch(head.className){
        case 'left':
            left=head.offsetLeft-50;
            top=head.offsetTop
            break;
        case 'right':
            left=head.offsetLeft+50;
            top=head.offsetTop
            break;
        case 'top':
            left=head.offsetLeft;
            top=head.offsetTop-50
            break;
        case 'down':
            left=head.offsetLeft;
            top=head.offsetTop+50
            break;
    }
    head.style.left=left+'px'
    head.style.top=top+'px'
}
//移动body
function moveBody(array){
    if (array.length>0) {
        for (var i = array.length - 1; i >= 0; i--) {
            switch(array[i].className){
                case 'left':
                    x=array[i].offsetLeft-50;
                    y=array[i].offsetTop
                    break;
                case 'right':
                    x=array[i].offsetLeft+50;
                    y=array[i].offsetTop
                    break;
                case 'top':
                    x=array[i].offsetLeft;
                    y=array[i].offsetTop-50
                    break;
                case 'down':
                    x=array[i].offsetLeft;
                    y=array[i].offsetTop+50
                    break;
            }
            array[i].style.left=x+"px";
            array[i].style.top=y+'px'
            if (i==0) {
                array[i].className=head.className
            }else{
                array[i].className=array[i-1].className
            }

        }
    }
}
/*
检测坐标是否重合
*/

function  checkfood(x,y,array){
    console.log(head)
    if (x==head.offsetLeft&&y==head.offsetTop) {
        return false
    }
    for (var i = 0; i < array.length; i++) {
        // 检测到重复
        if (array[i].offsetLeft==x&&array[i].offsetTop==y) {
            return false;
        }
        if (i==array.length-1) {
            return  true;
        }
    }
    return true;
}
/*
创建节点对象
 type 1  蛇头  2 food  3 身体
*/
function createNode(type,parent,preObj){
    var x=0;
    var y=0;
    var w=50;
    var h=50;
    var bgColor;
    var fen;
    var className="";
    var  preObj=preObj?preObj:null
    switch(type){
        case 1:
            bgColor="red"
            className="right"
            break;
        case 2:
            var foodtype=parseInt(Math.random()*10)%3
            var foods=[['yellow',1],['skyblue',2],['pink',3]]
            bgColor=foods[foodtype][0]
            fen=foods[foodtype][1]
            var array=bodys;
            // console.log(array)
            test();
        function test(){
            var a=parseInt(Math.random()*row)*50;
            var b=parseInt(Math.random()*col)*50;
            var state=checkfood(a,b,array)
            if (state) {
                x=a;
                y=b;
            }else{
                test();
            }
        }
            break;
        case 3:
            switch(preObj.className){
                case 'left':
                    x=preObj.offsetLeft+50;
                    y=preObj.offsetTop
                    break;
                case 'right':
                    x=preObj.offsetLeft-50;
                    y=preObj.offsetTop
                    break;
                case 'top':
                    x=preObj.offsetLeft;
                    y=preObj.offsetTop+50
                    break;
                case 'down':
                    x=preObj.offsetLeft;
                    y=preObj.offsetTop-50
                    break;
            }
            className=preObj.className;
            bgColor='black'
            break ;
        default:
            break

    }
    var node=document.createElement('div');
    node.style.background=bgColor;
    node.style.position="absolute";
    node.style.left=x+"px";
    node.style.top=y+"px";
    node.style.width=w+"px";
    node.style.height=h+"px";
    node.style.zIndex=999;
    node.className=className;
    node.setAttribute("value",fen)
    parent.appendChild(node)
    return node;
}



function reset(){
    window.location.reload();
}
//检测碰撞到边界框
function checkBorder(obj1,obj2) {
    if (obj1.offsetLeft>obj2.offsetWidth||obj1.offsetLeft<0||obj1.offsetTop<0||obj1.offsetTop>obj2.offsetHeight) {
        return false;
    }
    return true;
}