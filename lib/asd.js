<script>
    
    function doDisplay(asd){
    var con= document.getElementById(asd);
    if(con.style.display=='none'){
        con.style.display = '';       
    }else{
        con.style.display = 'none';
        $('#player-' + asd)[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        }
    };

</script>