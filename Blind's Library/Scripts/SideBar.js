let x = true
function SHButton(){
    if(x)
    {
        x =!x;
        document.getElementById('SBMainFn').style.left = '-240px';
        document.getElementById('SBBtnFn').style.left = '0px';
        document.getElementById('SBMainFn').style.opacity = 0.5;
        document.getElementById('LstBookFn').style.transition = '1s';
        document.getElementById('LstBookFn').style.paddingLeft = '60px';
        document.getElementById('LstBookFn').style.maxWidth = '1920px';
        document.getElementById('SBArrwIcn').src = 'RightArrow.png';
    }
    else
    {
        x=!x;
        document.getElementById('LstBookFn').style.paddingLeft = '300px';
        document.getElementById('SBMainFn').style.left = '0';
        document.getElementById('SBBtnFn').style.left = '240px';
        document.getElementById('SBMainFn').style.opacity = 1;
        document.getElementById('LstBookFn').style.maxWidth = '1603px';
        document.getElementById('SBArrwIcn').src = 'LeftArrow.png';
    }
  }