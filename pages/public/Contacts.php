



<?php include $_SERVER['DOCUMENT_ROOT'].'/Projects/includes/header.php' ?>
<div class="jumbotron">
<p 
 style="font-size:200%;">Contact Us
</p>
<form action="contactform.php" method="post">
<div class="form-group">
<label for="name">Your Name: </label>
<input type="text" class="form-control" id="name" name="customer_name" placeholder="John Smith" pattern=[A-Z\sa-z]{3,20} required>
</div>
<div class="form-group">
<label for="email">Your E-mail: </label>
<input type="email" class="form-control" id="email" name="customer_email" placeholder="john.smith@email.com" required>
</div>
<div class="form-group">
<label for="department-selection">Choose Department:</label>
<select class="form-control" id="department-selection" name="department" required>
<option value="">Select a Department</option>
<option value="product enquiry">Product Enquiry</option>
<option value="technical support">Technical Support</option>
<option value="other">Other</option>

</select>
</div>
<div class="form-group">
<label for="title">Reason For Contacting Us:</label>
<input type="text" class="form-control" id="title" name="subject" required placeholder="Enter reason here" >
</div>
<div class="form-group">
<label for="message">Write your message:</label>
<textarea class="form-control" id="message" name="customer_message" placeholder="Enter message here" required></textarea>
</div>
<button type="submit">Send Message</button>
</form>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Projects/includes/footer.php' ?>
