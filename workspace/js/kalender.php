    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/norsk.js"></script>
  
    <script>
        $(function() {
            $("#datepicker").datepicker({
                beforeShowDay: $.datepicker.noWeekends,
                minDate: 'moment',
                maxDate: "+1M +10D",
                dateFormat: "yy-mm-dd" 
            });
        });

    </script>