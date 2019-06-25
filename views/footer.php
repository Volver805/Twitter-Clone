</div>
<div class="footer-fix">
<?php
  echo("<div class='footer'><p style='text-align:center'>&copy; Ahmed Sayed | <a href='http://www.superdesigner.me'>superdesigner.me</a></p></div>");
?>  
</div>
    <script src="jquery-min.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <div class="modal fade" id="signModal" tabindex="-1" role="dialog" aria-labelledby="signModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign up</h5>
      </div>      
      <form>
      <input id="formValue" type="hidden" name="formValue" value="1">
      <div class="modal-body">
          <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" id="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
           <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" id="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
                <div id="errors-div"></div>
         </div>
</form>
    <div class="modal-footer">
              <a id="toggleSign" href="#">Sign in</a>
              <button id="signButton" class="btn btn-success">Sign Up</button>
              </div>
    </div>
  </div>

</div>
     <script src="main.js"></script>
  </body>
</html>