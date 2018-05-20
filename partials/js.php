<script src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
  function toggleAnswer(answer)
  {
      $('.answer').hide();
      var toggle='#'+answer;
      console.log(toggle);
      $(toggle).slideToggle();
  }
</script>
