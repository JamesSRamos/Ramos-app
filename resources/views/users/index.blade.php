<x-layout>
    <x-slot name="heading">
        <div class="page-header">
            <span class="page-label">Directory</span>
            <h1 class="page-title">User List</h1>
        </div>
    </x-slot>

    <div class="table-wrapper">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="col-id">{{ $user['id'] }}</td>
                        <td class="col-name">{{ $user['name'] }}</td>
                        <td class="col-gender">
                            <span class="gender-badge gender-{{ strtolower($user['gender']) }}">
                                {{ $user['gender'] }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(empty($users))
            <div class="empty-state">No users found.</div>
        @endif
    </div>
</x-layout>

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap');

    /* ── Header ── */
    .page-header {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
        padding: 2.5rem 0 1.5rem;
        animation: fadeUp 0.5s ease both;
    }

    .page-label {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.7rem;
        font-weight: 300;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: #9ca3af;
    }

    .page-title {
        font-family: 'DM Serif Display', serif;
        font-size: clamp(1.8rem, 4vw, 3rem);
        font-weight: 400;
        color: #111827;
        margin: 0;
        line-height: 1.1;
    }

    /* ── Table wrapper ── */
    .table-wrapper {
        animation: fadeUp 0.6s ease 0.1s both;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
    }

    /* ── Table ── */
    .user-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
    }

    .user-table thead tr {
        background-color: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }

    .user-table thead th {
        padding: 0.85rem 1.25rem;
        text-align: left;
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: #6b7280;
    }

    .user-table tbody tr {
        border-bottom: 1px solid #f3f4f6;
        transition: background 0.15s ease;
    }

    .user-table tbody tr:last-child {
        border-bottom: none;
    }

    .user-table tbody tr:hover {
        background-color: #f9fafb;
    }

    .user-table td {
        padding: 0.9rem 1.25rem;
        color: #374151;
        vertical-align: middle;
    }

    .col-id {
        font-size: 0.78rem;
        color: #9ca3af !important;
        font-weight: 300;
        width: 60px;
    }

    .col-name {
        font-weight: 400;
        color: #111827 !important;
    }

    /* ── Gender badge ── */
    .gender-badge {
        display: inline-block;
        padding: 0.2rem 0.65rem;
        font-size: 0.72rem;
        font-weight: 400;
        letter-spacing: 0.05em;
        border-radius: 999px;
        border: 1px solid transparent;
    }

    .gender-male {
        color: #1d4ed8;
        background: #eff6ff;
        border-color: #bfdbfe;
    }

    .gender-female {
        color: #be185d;
        background: #fdf2f8;
        border-color: #fbcfe8;
    }

    /* fallback for other values */
    .gender-badge:not(.gender-male):not(.gender-female) {
        color: #374151;
        background: #f3f4f6;
        border-color: #e5e7eb;
    }

    /* ── Empty state ── */
    .empty-state {
        padding: 3rem;
        text-align: center;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
        color: #9ca3af;
        font-weight: 300;
    }

    /* ── Animation ── */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>