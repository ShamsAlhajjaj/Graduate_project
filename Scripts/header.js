function openPopUP() {
    if(document.getElementById('PopUp1').style.opacity == 0)
    {
        document.getElementById('PopUp1').style.transition = '1s';
        document.getElementById('PopUp1').style.opacity = 1;
        document.getElementById('PopUp1').style.right = '50px';
    }
    else {
        document.getElementById('PopUp1').style.transition = '1s';
        document.getElementById('PopUp1').style.opacity = 0;
        document.getElementById('PopUp1').style.right = '-360px';
    }
}