<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><i class="fas fa-plus" style="color: #49b650;"></i><input disabled='disabled' type="file"
                class="upload-attachment" name="file"
                accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, .{{ implode(', .', config('chatify.attachments.allowed_files')) }}" /></label>
        <button class="emoji-button"><i class="far fa-smile-beam" style="color: #eca918;"></i></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Ketik Pesan ..."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>
