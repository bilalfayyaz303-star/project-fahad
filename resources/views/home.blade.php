@extends("layout")



@section("content")




<main class="flex-1 p-4 lg:p-8 space-y-6">
    
    
    
    <!-- page heading -->
    <div class="tick p-6 bg-white border border-line flex flex-wrap items-end justify-between gap-4">
        <div>
            <p class="text-[11px] text-muted tracking-[.15em] mb-2 font-mono">
                GOOD AFTERNOON, MAYA // SYSTEM OPERATIONAL
            </p>
            <h1 class="text-4xl lg:text-5xl font-display leading-none tracking-tight">
                Store performance,<br />this week
            </h1>
        </div>
        <div class="flex gap-2">
            <a href="reports.html" class="btn-outline">EXPORT REPORT</a>
            <a href="add-product.html" class="btn-solid">‹ ADD PRODUCT ›</a>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="card p-5">
            <p class="text-[11px] text-muted tracking-[.1em]">
                TOTAL REVENUE
            </p>
            <p class="font-display text-4xl mt-2 countup" data-target="48920" data-prefix="$">
                $0
            </p>
            <div class="flex items-center gap-1 mt-3 text-xs text-green font-mono">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <polyline points="18 15 12 9 6 15" />
                </svg>
                +12.4% VS LAST WEEK
            </div>
        </div>

        <div class="card p-5">
            <p class="text-[11px] text-muted tracking-[.1em]">
                ACTIVE USERS
            </p>
            <p class="font-display text-4xl mt-2 countup" data-target="6284">
                0
            </p>
            <div class="flex items-center gap-1 mt-3 text-xs text-green font-mono">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <polyline points="18 15 12 9 6 15" />
                </svg>
                +8.1% VS LAST WEEK
            </div>
        </div>

        <div class="card p-5">
            <p class="text-[11px] text-muted tracking-[.1em]">OPEN ORDERS</p>
            <p class="font-display text-4xl mt-2 countup" data-target="342">
                0
            </p>
            <div class="flex items-center gap-1 mt-3 text-xs text-muted font-mono">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                3 NEED ATTENTION
            </div>
        </div>

        <div class="card p-5">
            <p class="text-[11px] text-muted tracking-[.1em]">
                CONVERSION RATE
            </p>
            <p class="font-display text-4xl mt-2 countup" data-target="382" data-suffix="%" data-decimal="1">
                0%
            </p>
            <div class="flex items-center gap-1 mt-3 text-xs text-green font-mono">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <polyline points="18 15 12 9 6 15" />
                </svg>
                +0.6% VS LAST WEEK
            </div>
        </div>
    </div>

    <!-- CHART + TERMINAL LOG -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
        <div class="xl:col-span-2 card p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="font-display text-2xl">
                        Revenue this week
                    </h2>
                    <p class="text-muted text-xs mt-0.5 font-mono">
                        DAILY GROSS REVENUE, MON—SUN
                    </p>
                </div>
                <div class="flex border border-line text-xs font-mono">
                    <button class="chart-tab px-3 py-1.5 bg-ink text-canvas transition" data-range="week">
                        WEEK
                    </button>
                    <button class="chart-tab px-3 py-1.5 text-muted hover:text-ink transition" data-range="month">
                        MONTH
                    </button>
                </div>
            </div>
            <div class="bar-track" id="barTrack"></div>
            <div class="flex justify-between mt-3 text-[10px] text-muted tracking-wide font-mono">
                <span>MON</span><span>TUE</span><span>WED</span><span>THU</span><span>FRI</span><span>SAT</span><span>SUN</span>
            </div>
        </div>

        <!-- terminal-style activity log -->
        <div class="border border-line overflow-hidden flex flex-col">
            <div class="bg-terminal px-4 py-3 flex items-center gap-2 border-b border-white/10">
                <span class="term-dot bg-[#FF5F56]"></span>
                <span class="term-dot bg-[#FFBD2E]"></span>
                <span class="term-dot bg-[#27C93F]"></span>
                <span class="text-[11px] text-white/50 ml-2 font-mono tracking-wider">activity.log</span>
            </div>
            <div class="bg-terminal flex-1 p-4 text-[12.5px] leading-relaxed font-mono">
                <p class="text-white/40"># order fulfilled</p>
                <p class="text-green">
                    $ order #10245 shipped <span class="text-white/30">· 2m</span>
                </p>
                <p class="text-white/40 mt-3"># new account</p>
                <p class="text-white/80">
                    $ hassan.r signed up <span class="text-white/30">· 18m</span>
                </p>
                <p class="text-white/40 mt-3"># inventory</p>
                <p class="text-[#FFBD2E]">
                    $ low stock: desk lamp — oak
                    <span class="text-white/30">· 41m</span>
                </p>
                <p class="text-white/40 mt-3"># payment</p>
                <p class="text-[#FF5F56]">
                    $ order #10239 failed <span class="text-white/30">· 1h</span>
                </p>
                <p class="text-white/40 mt-3"># refund</p>
                <p class="text-green">
                    $ order #10228 refunded
                    <span class="text-white/30">· 3h</span>
                </p>
                <p class="text-white/50 mt-3">
                    _<span class="animate-pulse">|</span>
                </p>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="card overflow-hidden">
        <div class="flex items-center justify-between p-6 pb-4">
            <h2 class="font-display text-2xl">Recent orders</h2>
            <a href="orders.html"
                class="text-xs font-mono tracking-wide inline-flex items-center gap-1 hover:underline">VIEW ALL ›</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-[13px]">
                <thead>
                    <tr class="text-left text-muted border-y border-line text-[11px] tracking-[.05em] font-mono">
                        <th class="font-semibold px-6 py-3">ORDER</th>
                        <th class="font-semibold px-6 py-3">CUSTOMER</th>
                        <th class="font-semibold px-6 py-3">PRODUCT</th>
                        <th class="font-semibold px-6 py-3">STATUS</th>
                        <th class="font-semibold px-6 py-3 text-right">AMOUNT</th>
                    </tr>
                </thead>
                <tbody id="ordersBody"></tbody>
            </table>
        </div>
    </div>

    @endsection