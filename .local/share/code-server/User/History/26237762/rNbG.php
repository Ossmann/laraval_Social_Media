  <!-- Reply Button with bootstrap Modal -->
  <div class="reply">

<!-- Button trigger modal -- add the comment variable to the data target -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $comment->comment_id }}">
<i class="bi bi-reply-all-fill"></i>Reply</a>
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $comment->comment_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">What do you want to reply to {{$comment->user_name}}?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @dump($comment->comment_id)
      <form method="post" action="{{ url('create_reply_action/' . $comment->post_id . '/' . $comment->comment_id) }}">
          {{csrf_field()}}
          <p>
            <label>Your Username</label>
            <input type="text" name="author">
          </p>
          <p>
            <label>Reply</label>
            <textarea type="text" name="reply_message"></textarea>
          </p>
            <input type="submit" value="Reply">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>