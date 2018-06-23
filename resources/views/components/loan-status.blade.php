@if ($slot == 'approved')
    <span class="badge badge-success">{{ $slot }}</span>
@elseif ($slot == 'denied')
    <span class="badge badge-danger">{{ $slot }}</span>
@elseif ($slot == 'processing')
    <span class="badge badge-warning">{{ $slot }}</span>
@else
    <span class="badge badge-secondary">{{ $slot }}</span>
@endif
