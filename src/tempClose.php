<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<a href = "#myModal" data-toggle="modal" data-target = "#edit-modal"><span class = "glyphicon glyphicon-tag"></span></a>
<div id="edit-modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add tags</h4>
            </div>
            <div class="modal-body">
                <form name="form2" id="form2" method="post" action="{% url 'savetag' %}" class="form-inline">
                    {% csrf_token %}
                    <div class="form-group">
                        <input name="tag" id="tag" required>
                        <button type="submit" class="btn btn-danger">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<?php
< script >
$('#edit-modal').on('hidden.bs.modal', function(e) {
document.getElementById('#form2')[0].reset(); //or $('#form2')[0].reset();
}); < /script>

?>

