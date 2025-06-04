@component('mail::message')

# Congratulations {{ $candidateName }},

Your application for the position **{{ $jobTitle }}** has been **shortlisted** by the employer.

We will keep you updated on the next steps.

Thanks,<br>
{{ config('app.name') }}

@endcomponent