<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap');

        .dash-wrap {
            font-family: 'DM Sans', sans-serif;
            padding: 2.5rem 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .dash-label {
            font-size: 0.72rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #9ca3af;
            font-weight: 500;
            margin-bottom: 0.3rem;
        }

        .dash-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: #111827;
            letter-spacing: -0.02em;
        }

        .dash-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 2rem;
        }

        @media (min-width: 768px) {
            .dash-grid { grid-template-columns: repeat(4, 1fr); }
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 1.4rem 1.25rem;
            position: relative;
            overflow: hidden;
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .stat-card:hover {
            box-shadow: 0 8px 24px rgba(0,0,0,0.07);
            transform: translateY(-2px);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            border-radius: 14px 14px 0 0;
        }

        .stat-card.blue::before   { background: #3b82f6; }
        .stat-card.green::before  { background: #22c55e; }
        .stat-card.amber::before  { background: #f59e0b; }
        .stat-card.purple::before { background: #a855f7; }

        .stat-label {
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .stat-card.blue   .stat-label { color: #3b82f6; }
        .stat-card.green  .stat-label { color: #22c55e; }
        .stat-card.amber  .stat-label { color: #f59e0b; }
        .stat-card.purple .stat-label { color: #a855f7; }

        .stat-value {
            font-size: 2rem;
            font-weight: 600;
            color: #111827;
            letter-spacing: -0.03em;
            line-height: 1;
        }

        .stat-value.smaller {
            font-size: 1.35rem;
        }
    </style>

    <div class="dash-wrap">
        <div>
            <p class="dash-label">Overview</p>
            <h2 class="dash-title">Dashboard</h2>
        </div>

        <div class="dash-grid">
            <div class="stat-card blue">
                <p class="stat-label">Total Kategori</p>
                <p class="stat-value">{{ $totalCategories }}</p>
            </div>
            <div class="stat-card green">
                <p class="stat-label">Total Item</p>
                <p class="stat-value">{{ $totalItems }}</p>
            </div>
            <div class="stat-card amber">
                <p class="stat-label">Transaksi</p>
                <p class="stat-value">{{ $totalTransactions }}</p>
            </div>
            <div class="stat-card purple">
                <p class="stat-label">Total Revenue</p>
                <p class="stat-value smaller">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</x-app-layout>