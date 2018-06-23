@if ($slot == 'approved')
    <span class="badge badge-success">{{ $slot }}</span>
@elseif ($slot == 'disapproved')
    <span class="badge badge-danger">{{ $slot }}</span>
@else
    <span class="badge badge-secondary">{{ $slot }}</span>
@endif
