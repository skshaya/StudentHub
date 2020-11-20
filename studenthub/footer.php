<!-- Footer -->
<footer class="w3-container w3-theme-d5">
  <p style="text-align:center;">&copy;<b>UWU Student Hub powered by CST Group 10</b></p>
</footer>

<script>
$(window).scroll(function() {
   if(!$(window).scrollTop() + $(window).height() == $(document).height()) {
       $("footer").addClass('footer');
   }
});

if($(window).height() >= $(document).height()) {
		$("footer").addClass('footer');
}

</script>