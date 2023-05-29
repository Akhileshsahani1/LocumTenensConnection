<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://kit.fontawesome.com/2b6a19a134.js" crossorigin="anonymous"></script>
<script src="{{asset('Js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Js/script.js')}}"></script>
<script>
    $(".circle-arrow").on({
	mouseover:function(){
		$(this).find("img.off").css('display','none');
		$(this).find("img.on").css('display','block');
	}, mouseout:function(){
		$(this).find("img.off").css('display','block');
		$(this).find("img.on").css('display','none');
	} 
});
</script>
</body>
</html>