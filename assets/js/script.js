document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var toll = document.querySelectorAll('.tollfree');
    var instances = M.Tooltip.init(toll);
});