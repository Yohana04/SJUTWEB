<x-mail::message>
# {{ $type }}: {{ $title }}

Hello from CICT!

We have recently posted a new **{{ strtolower($type) }}** that might interest you:

{{ Str::limit(strip_tags($contentBody), 200, '...') }}

<x-mail::button :url="$url">
Read More
</x-mail::button>

Thank you for being part of our community.

Thanks,<br>
CICT - St John's University of Tanzania
</x-mail::message>
