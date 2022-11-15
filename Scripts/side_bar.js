let _open = true
function SHButton(){
    if(_open)
    {
        _open =!_open;
        document.getElementById('SBMainFn').style.left = '-240px';
        document.getElementById('SBBtnFn').style.left = '0px';
        document.getElementById('SBMainFn').style.opacity = 0.5;
        document.getElementById('Body').style.transition = '1s';
        document.getElementById('Body').style.paddingLeft = '60px';
        document.getElementById('Body').style.maxWidth = '1920px';
        document.getElementById('SBArrwIcn').src = '_images/side-bar-icons/open_button_icon.png';
    }
    else
    {
        _open=!_open;
        document.getElementById('Body').style.paddingLeft = '300px';
        document.getElementById('SBMainFn').style.left = '0';
        document.getElementById('SBBtnFn').style.left = '240px';
        document.getElementById('SBMainFn').style.opacity = 1;
        document.getElementById('Body').style.maxWidth = '1603px';
        document.getElementById('SBArrwIcn').src = '_images/side-bar-icons/close_button_icon.png';
    }
  }