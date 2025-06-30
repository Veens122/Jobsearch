@extends($layout)

@section('content')

<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->

    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ======================= dashboard Detail ======================== -->
    <div class="dashboard-wrap bg-light">
        <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
            aria-controls="MobNav">
            <i class="fas fa-bars mr-2"></i>Dashboard Navigation
        </a>


        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-4">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="mb-1 fs-3 fw-medium">Message Inbox</h1>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <!-- Conversation -->
                <div class="messages-container margin-top-0">
                    <div class="messages-headline">
                        <h4>Inbox</h4>
                    </div>

                    <div class="messages-container-inner">
                        <!-- Message Inbox -->
                        <div class="dash-msg-inbox">
                            <ul>
                                @forelse ($messages as $message)
                                <li>
                                    <a href="{{ route('candidate.message.view', $message->id) }}">
                                        <div class="dash-msg-avatar">
                                            <img src="{{ asset('assets/img/user-default.png') }}" alt="">
                                        </div>
                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>{{ $message->sender->name ?? 'Unknown Sender' }}</h5>
                                                <span>{{ $message->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p>{{ Str::limit($message->body, 40) }}</p>
                                        </div>
                                    </a>
                                </li>
                                @empty
                                <li>
                                    <p class="p-3">No messages yet.</p>
                                </li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Selected Message Content -->
                        @isset($selectedMessage)
                        <div class="dash-msg-content">
                            <div class="message-plunch">
                                <div class="dash-msg-avatar">
                                    <img src="{{ asset('assets/img/user-default.png') }}" alt="">
                                </div>
                                <div class="dash-msg-text">
                                    <p>{{ $selectedMessage->body }}</p>
                                    <small class="text-muted">Sent by {{ $selectedMessage->sender->name ?? 'Unknown' }}
                                        on {{ $selectedMessage->created_at->format('M d, Y h:i A') }}</small>
                                </div>
                            </div>

                            <!-- Reply Form -->
                            <div class="clearfix"></div>
                            <form action="{{ route('candidate.message.reply', $selectedMessage->id) }}" method="POST">
                                @csrf
                                <div class="message-reply">
                                    <textarea name="body" cols="40" rows="3" class="form-control with-light"
                                        placeholder="Your Message" required></textarea>
                                    <button type="submit" class="btn btn-primary mt-2">Send Message</button>
                                </div>
                            </form>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>

            <!-- footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3 text-center">© 2024 - 2025 Job Veens® Ugochukwu.</div>
                </div>
            </div>
        </div>


    </div>
    <!-- ======================= dashboard Detail End ======================== -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>


@endsection