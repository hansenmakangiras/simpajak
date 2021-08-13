<div class="modal fade {{ isset($modalClass) ?? $modalClass }}" id="flash-overlay-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <p class="modal-text">{!! $body !!}</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
{{--                <button type="button" class="btn btn-primary">Save</button>--}}
            </div>
        </div>
    </div>
</div>
