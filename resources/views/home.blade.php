@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('styles')
<style>
    .dashboard-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 22px;
    }

    .dashboard-title {
        margin: 0;
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
    }

    .dashboard-subtitle {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .dashboard-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        background: #fff;
        color: #475569;
        font-size: 13px;
        font-weight: 700;
    }

    .welcome-banner {
        background: linear-gradient(135deg, #2563eb 0%, #0f766e 100%);
        border-radius: 16px;
        padding: 24px;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-bottom: 22px;
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255,255,255,.1);
        right: -70px;
        top: -80px;
    }

    .welcome-banner h3 {
        margin: 0 0 7px;
        font-size: 22px;
        font-weight: 800;
    }

    .welcome-banner p {
        margin: 0;
        opacity: .88;
        font-size: 13px;
    }

    .stat-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 22px;
    }

    .dash-stat-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 18px;
        transition: .2s ease;
    }

    .dash-stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(15, 23, 42, .08);
    }

    .dash-stat-top {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        align-items: flex-start;
    }

    .dash-stat-label {
        margin: 0 0 8px;
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .dash-stat-value {
        margin: 0;
        color: #0f172a;
        font-size: 28px;
        line-height: 1;
        font-weight: 850;
    }

    .dash-stat-note {
        display: inline-flex;
        margin-top: 10px;
        padding: 4px 9px;
        border-radius: 999px;
        background: #f1f5f9;
        color: #475569;
        font-size: 11px;
        font-weight: 750;
    }

    .dash-icon {
        width: 48px;
        height: 48px;
        border-radius: 13px;
        display: grid;
        place-items: center;
        background: #dbeafe;
        color: #2563eb;
        font-size: 19px;
    }

    .dash-layout {
        display: grid;
        grid-template-columns: 1.7fr .9fr;
        gap: 16px;
        align-items: start;
    }

    .dash-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        overflow: hidden;
    }

    .dash-card-head {
        padding: 16px 18px;
        border-bottom: 1px solid #eef2f7;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .dash-card-title {
        margin: 0;
        font-size: 15px;
        font-weight: 850;
        color: #0f172a;
    }

    .dash-card-subtitle {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .dash-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    .dash-table th {
        background: #f8fafc;
        color: #64748b;
        font-size: 11px;
        font-weight: 850;
        text-transform: uppercase;
        letter-spacing: .05em;
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .dash-table td {
        padding: 13px 16px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        color: #334155;
    }

    .dash-table tr:last-child td {
        border-bottom: 0;
    }

    .patient-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .patient-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #2563eb;
        color: #fff;
        display: grid;
        place-items: center;
        font-size: 13px;
        font-weight: 850;
        flex: 0 0 auto;
    }

    .patient-name {
        margin: 0;
        font-weight: 800;
        color: #0f172a;
    }

    .patient-meta {
        margin: 2px 0 0;
        font-size: 11.5px;
        color: #94a3b8;
    }

    .pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 9px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 800;
        white-space: nowrap;
    }

    .pill-blue { background: #dbeafe; color: #1d4ed8; }
    .pill-yellow { background: #fef3c7; color: #92400e; }
    .pill-green { background: #dcfce7; color: #166534; }

    .view-btn,
    .modal-link-btn {
        border: 0;
        background: #eef2ff;
        color: #4338ca;
        border-radius: 10px;
        padding: 8px 11px;
        font-size: 12px;
        font-weight: 850;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }

    .side-list {
        padding: 10px 14px 14px;
        display: grid;
        gap: 10px;
    }

    .side-item {
        border: 1px solid #eef2f7;
        border-radius: 13px;
        padding: 13px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }

    .side-item strong {
        display: block;
        color: #0f172a;
        font-size: 13px;
    }

    .side-item span {
        display: block;
        color: #94a3b8;
        font-size: 12px;
        margin-top: 2px;
    }

    .side-count {
        min-width: 40px;
        height: 40px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        background: #f1f5f9;
        color: #0f172a;
        font-weight: 850;
    }

    .dashboard-modal {
        position: fixed;
        inset: 0;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        z-index: 9999;
    }

    .dashboard-modal.active {
        display: flex;
    }

    .modal-backdrop-soft {
        position: absolute;
        inset: 0;
        background: rgba(15, 23, 42, .56);
        backdrop-filter: blur(4px);
    }

    .modal-panel {
        position: relative;
        width: min(620px, 100%);
        max-height: 86vh;
        overflow: auto;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 24px 80px rgba(15,23,42,.28);
    }

    .modal-panel-head {
        padding: 18px 20px;
        border-bottom: 1px solid #eef2f7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }

    .modal-panel-head h3 {
        margin: 0;
        color: #0f172a;
        font-size: 17px;
        font-weight: 850;
    }

    .modal-close {
        width: 36px;
        height: 36px;
        border: 0;
        border-radius: 10px;
        background: #f1f5f9;
        color: #475569;
        cursor: pointer;
    }

    .modal-body {
        padding: 18px 20px 20px;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 150px 1fr;
        gap: 12px;
        padding: 11px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .detail-row:last-child {
        border-bottom: 0;
    }

    .detail-label {
        color: #64748b;
        font-size: 12px;
        font-weight: 850;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .detail-value {
        color: #0f172a;
        font-size: 13px;
        font-weight: 650;
        white-space: pre-wrap;
    }

    @media(max-width: 980px) {
        .stat-grid,
        .dash-layout {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 640px) {
        .dashboard-head {
            align-items: flex-start;
            flex-direction: column;
        }

        .dash-table th:nth-child(3),
        .dash-table td:nth-child(3) {
            display: none;
        }

        .detail-row {
            grid-template-columns: 1fr;
            gap: 5px;
        }
    }
</style>
@endsection

@section('content')

<div class="dashboard-head">
    <div>
        <h2 class="dashboard-title">Dashboard</h2>
        <p class="dashboard-subtitle">
            Welcome back, <strong>{{ auth()->user()->name }}</strong>. Enquiry summary and latest patient requests are here.
        </p>
    </div>

    <div class="dashboard-date">
        <i class="fas fa-clock"></i>
        {{ now()->format('D, d M Y') }}
    </div>
</div>

<div class="welcome-banner">
    <div style="position:relative; z-index:1;">
        <h3>Clinic Enquiry Dashboard</h3>
        <p>Track appointment requests, contact enquiries and quick website content counts from one focused admin screen.</p>
    </div>
</div>

<div class="stat-grid">
    <div class="dash-stat-card">
        <div class="dash-stat-top">
            <div>
                <p class="dash-stat-label">Total Enquiries</p>
                <p class="dash-stat-value">{{ $stats['total_enquiries'] }}</p>
                <span class="dash-stat-note">All patient requests</span>
            </div>
            <div class="dash-icon"><i class="fas fa-inbox"></i></div>
        </div>
    </div>

    <div class="dash-stat-card">
        <div class="dash-stat-top">
            <div>
                <p class="dash-stat-label">Today</p>
                <p class="dash-stat-value">{{ $stats['today_enquiries'] }}</p>
                <span class="dash-stat-note">New today</span>
            </div>
            <div class="dash-icon" style="background:#dcfce7;color:#16a34a;"><i class="fas fa-calendar-day"></i></div>
        </div>
    </div>

    <div class="dash-stat-card">
        <div class="dash-stat-top">
            <div>
                <p class="dash-stat-label">Appointments</p>
                <p class="dash-stat-value">{{ $stats['appointment_enquiries'] }}</p>
                <span class="dash-stat-note">Book form</span>
            </div>
            <div class="dash-icon" style="background:#fef3c7;color:#d97706;"><i class="fas fa-calendar-check"></i></div>
        </div>
    </div>

    <div class="dash-stat-card">
        <div class="dash-stat-top">
            <div>
                <p class="dash-stat-label">Contact Enquiries</p>
                <p class="dash-stat-value">{{ $stats['contact_enquiries'] }}</p>
                <span class="dash-stat-note">Contact form</span>
            </div>
            <div class="dash-icon" style="background:#fce7f3;color:#db2777;"><i class="fas fa-envelope-open-text"></i></div>
        </div>
    </div>
</div>

<div class="dash-layout">
    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <p class="dash-card-title">Recent Enquiries</p>
                <p class="dash-card-subtitle">Latest appointment and contact submissions</p>
            </div>
            <button type="button" class="modal-link-btn" data-modal-target="appointment-list-modal">
                <i class="fas fa-list"></i>
                View All
            </button>
        </div>

        <div style="overflow-x:auto;">
            <table class="dash-table">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Source</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th style="text-align:right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentEnquiries as $enquiry)
                        @php
                            $modalId = 'enquiry-modal-' . strtolower($enquiry->source_label) . '-' . $enquiry->id;
                        @endphp
                        <tr>
                            <td>
                                <div class="patient-cell">
                                    <div class="patient-avatar">
                                        {{ strtoupper(substr($enquiry->full_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="patient-name">{{ $enquiry->full_name }}</p>
                                        <p class="patient-meta">{{ $enquiry->phone }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="pill {{ $enquiry->source_class }}">{{ $enquiry->source_label }}</span>
                            </td>
                            <td>{{ optional($enquiry->service)->title ?? $enquiry->service_required ?? '-' }}</td>
                            <td>{{ optional($enquiry->created_at)->format('d M, H:i') }}</td>
                            <td style="text-align:right;">
                                <button type="button" class="view-btn" data-modal-target="{{ $modalId }}">
                                    <i class="fas fa-eye"></i>
                                    View
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align:center;color:#94a3b8;padding:26px;">No enquiries yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <p class="dash-card-title">Website Summary</p>
                <p class="dash-card-subtitle">Quick content counts</p>
            </div>
            <button type="button" class="modal-link-btn" data-modal-target="website-summary-modal">
                <i class="fas fa-layer-group"></i>
                Modal
            </button>
        </div>

        <div class="side-list">
            <div class="side-item">
                <div>
                    <strong>Services</strong>
                    <span>Dental services</span>
                </div>
                <div class="side-count">{{ $stats['services'] }}</div>
            </div>
            <div class="side-item">
                <div>
                    <strong>Doctors</strong>
                    <span>Doctor profiles</span>
                </div>
                <div class="side-count">{{ $stats['doctors'] }}</div>
            </div>
            <div class="side-item">
                <div>
                    <strong>Gallery</strong>
                    <span>Clinic images</span>
                </div>
                <div class="side-count">{{ $stats['galleries'] }}</div>
            </div>
            <div class="side-item">
                <div>
                    <strong>Patient Reviews</strong>
                    <span>Review cards</span>
                </div>
                <div class="side-count">{{ $stats['reviews'] }}</div>
            </div>
        </div>
    </div>
</div>

@foreach($recentEnquiries as $enquiry)
    @php
        $modalId = 'enquiry-modal-' . strtolower($enquiry->source_label) . '-' . $enquiry->id;
    @endphp
    <div class="dashboard-modal" id="{{ $modalId }}" aria-hidden="true">
        <div class="modal-backdrop-soft" data-modal-close></div>
        <div class="modal-panel">
            <div class="modal-panel-head">
                <h3>{{ $enquiry->source_label }} Enquiry #{{ $enquiry->id }}</h3>
                <button type="button" class="modal-close" data-modal-close>
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="detail-row">
                    <span class="detail-label">Full Name</span>
                    <span class="detail-value">{{ $enquiry->full_name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value"><a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $enquiry->email ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Service</span>
                    <span class="detail-value">{{ optional($enquiry->service)->title ?? $enquiry->service_required ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Preferred Date</span>
                    <span class="detail-value">{{ optional($enquiry->preferred_date)->format('d M Y') ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Preferred Time</span>
                    <span class="detail-value">{{ $enquiry->preferred_time ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Message</span>
                    <span class="detail-value">{{ $enquiry->message ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Submitted</span>
                    <span class="detail-value">{{ optional($enquiry->created_at)->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="dashboard-modal" id="appointment-list-modal" aria-hidden="true">
    <div class="modal-backdrop-soft" data-modal-close></div>
    <div class="modal-panel">
        <div class="modal-panel-head">
            <h3>All Recent Enquiries</h3>
            <button type="button" class="modal-close" data-modal-close>
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            @forelse($recentEnquiries as $enquiry)
                <div class="detail-row">
                    <span class="detail-label">{{ $enquiry->source_label }}</span>
                    <span class="detail-value">
                        {{ $enquiry->full_name }} - {{ $enquiry->phone }}
                        <br>
                        {{ optional($enquiry->service)->title ?? $enquiry->service_required ?? '-' }}
                    </span>
                </div>
            @empty
                <p style="color:#94a3b8;margin:0;">No enquiries yet.</p>
            @endforelse
        </div>
    </div>
</div>

<div class="dashboard-modal" id="website-summary-modal" aria-hidden="true">
    <div class="modal-backdrop-soft" data-modal-close></div>
    <div class="modal-panel">
        <div class="modal-panel-head">
            <h3>Website Summary</h3>
            <button type="button" class="modal-close" data-modal-close>
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="detail-row"><span class="detail-label">Services</span><span class="detail-value">{{ $stats['services'] }}</span></div>
            <div class="detail-row"><span class="detail-label">Doctors</span><span class="detail-value">{{ $stats['doctors'] }}</span></div>
            <div class="detail-row"><span class="detail-label">Gallery</span><span class="detail-value">{{ $stats['galleries'] }}</span></div>
            <div class="detail-row"><span class="detail-label">Reviews</span><span class="detail-value">{{ $stats['reviews'] }}</span></div>
            <div class="detail-row"><span class="detail-label">Appointments</span><span class="detail-value">{{ $stats['appointment_enquiries'] }}</span></div>
            <div class="detail-row"><span class="detail-label">Contact Enquiries</span><span class="detail-value">{{ $stats['contact_enquiries'] }}</span></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-modal-target]').forEach(function (button) {
        button.addEventListener('click', function () {
            const modal = document.getElementById(button.dataset.modalTarget);
            if (modal) {
                modal.classList.add('active');
                modal.setAttribute('aria-hidden', 'false');
            }
        });
    });

    document.querySelectorAll('[data-modal-close]').forEach(function (button) {
        button.addEventListener('click', function () {
            const modal = button.closest('.dashboard-modal');
            if (modal) {
                modal.classList.remove('active');
                modal.setAttribute('aria-hidden', 'true');
            }
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') return;

        document.querySelectorAll('.dashboard-modal.active').forEach(function (modal) {
            modal.classList.remove('active');
            modal.setAttribute('aria-hidden', 'true');
        });
    });
});
</script>
@endsection
