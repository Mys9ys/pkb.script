<input type="checkbox" id="pkb_toggle" onclick="pkbClick()">

<script>
    btn = document.getElementsByClassName('pkb_toggle')

    console.log(btn)

    function pkbClick(e){
        btn = document.getElementById('pkb_toggle')
        // console.log(e.value)
        console.log(btn.checked)
    }
</script>
