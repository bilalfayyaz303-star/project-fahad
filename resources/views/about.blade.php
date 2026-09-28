<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orbit — Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Anton&family=IBM+Plex+Mono:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              canvas: "#EEECE1",
              ink: "#171717",
              muted: "#85827A",
              line: "#D9D6C9",
              green: "#2ABD73",
              terminal: "#1B1B1B",
            },
            fontFamily: {
              display: ["Anton", "sans-serif"],
              mono: ['"IBM Plex Mono"', "monospace"],
            },
          },
        },
      };
    </script>
    <style>
      * {
        box-shadow: none !important;
        border-radius: 0 !important;
      }
      body {
        font-family: "IBM Plex Mono", monospace;
        background:
          linear-gradient(#dedbcc 1px, transparent 1px),
          linear-gradient(90deg, #dedbcc 1px, transparent 1px);
        background-size: 40px 40px;
        background-color: #eeece1;
        color: #171717;
      }
      h1,
      h2,
      h3,
      .font-display {
        font-family: "Anton", sans-serif;
        letter-spacing: 0.02em;
        text-transform: uppercase;
      }

      .card {
        background: #fff;
        border: 1px solid #d9d6c9;
        transition: border-color 0.15s ease;
      }
      .card:hover {
        border-color: #171717;
      }
      
      .tick {
        position: relative;
      }
      .tick::before,
      .tick::after {
        content: "";
        position: absolute;
        width: 12px;
        height: 12px;
        pointer-events: none;
      }
      .tick::before {
        top: -1px;
        left: -1px;
        border-top: 1px solid #171717;
        border-left: 1px solid #171717;
      }
      .tick::after {
        top: -1px;
        right: -1px;
        border-top: 1px solid #171717;
        border-right: 1px solid #171717;
      }

      .btn-solid {
        background: #171717;
        color: #eeece1;
        font-family: "IBM Plex Mono", monospace;
        letter-spacing: 0.04em;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 20px;
        font-size: 13px;
        font-weight: 500;
        border: 1px solid #171717;
        transition: background 0.15s ease;
      }
      .btn-solid:hover {
        background: #333;
      }
      .btn-outline {
        background: transparent;
        color: #171717;
        font-family: "IBM Plex Mono", monospace;
        letter-spacing: 0.04em;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        font-size: 13px;
        font-weight: 500;
        border: 1px solid #171717;
        transition: all 0.15s ease;
      }
      .btn-outline:hover {
        background: #171717;
        color: #eeece1;
      }

      .nav-item {
        font-family: "IBM Plex Mono", monospace;
        font-size: 13px;
        letter-spacing: 0.03em;
        transition: background 0.15s ease, color 0.15s ease;
      }
      .nav-item.active {
        background: #171717;
        color: #eeece1;
        border-left: 4px solid #2abd73;
      }
      .nav-item .arrow {
        opacity: 0;
        transition: opacity 0.15s;
      }
      .nav-item.active .arrow,
      .nav-item:hover .arrow {
        opacity: 1;
      }

      .bar-track {
        display: flex;
        align-items: flex-end;
        gap: 10px;
        height: 180px;
      }
      .bar {
        flex: 1;
        background: #171717;
        position: relative;
        transition: height 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
        height: 0;
      }
      .bar.peak {
        background: #2abd73;
      }
      .bar span {
        position: absolute;
        top: -22px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 10px;
        color: #85827a;
        white-space: nowrap;
        font-family: "IBM Plex Mono", monospace;
      }

      .tag {
        font-size: 11px;
        letter-spacing: 0.03em;
        padding: 3px 8px;
        display: inline-block;
        border: 1px solid currentColor;
        font-family: "IBM Plex Mono", monospace;
      }

      .term-dot {
        width: 9px;
        height: 9px;
        border-radius: 50% !important;
      }

      ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
      }
      ::-webkit-scrollbar-thumb {
        background: #171717;
      }

      #sidebar {
        transition: width 0.25s ease, transform 0.25s ease;
        height: 100vh;
        position: sticky;
        top: 0;
      }
      
      /* Sidebar collapse helper classes */
      #sidebar.collapsed {
        width: 76px;
      }
      #sidebar.collapsed .hide-on-collapse {
        display: none !important;
      }
      #sidebar.collapsed .collapse-center {
        justify-content: center !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }

      @media (max-width: 1023px) {
        #sidebar {
          position: fixed;
          z-index: 40;
          height: 100vh;
          transform: translateX(-100%);
          width: 260px !important;
        }
        #sidebar.open {
          transform: translateX(0);
        }
      }

      a:focus-visible,
      button:focus-visible,
      input:focus-visible {
        outline: 1px solid #171717;
        outline-offset: 2px;
      }
    </style>
  </head>
  <body class="text-ink">
    <div class="flex min-h-screen">
      <div
        id="overlay"
        class="fixed inset-0 bg-ink/40 z-30 hidden lg:hidden"
      ></div>

      <!-- SIDEBAR -->
      <aside
        id="sidebar"
        class="w-64 shrink-0 font-bold bg-canvas bg-white border-r border-line flex flex-col justify-between"
      >
        <div class="flex flex-col h-full overflow-hidden">
          <!-- Top Brand & Toggle -->
          <div class="h-16 flex items-center justify-between px-6 border-b border-line shrink-0">
            <div class="flex items-center gap-2 overflow-hidden">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="shrink-0">
                <path
                  d="M2 14L12 6L22 14"
                  stroke="#171717"
                  stroke-width="2.4"
                  stroke-linecap="square"
                />
                <path
                  d="M2 20L12 12L22 20"
                  stroke="#171717"
                  stroke-width="2.4"
                  stroke-linecap="square"
                />
              </svg>
              <a
                href="admin-dashboard.html"
                class="font-mono font-bold text-base tracking-tight hide-on-collapse"
                >ORBIT</a
              >
            </div>
            <button id="sidebarToggle" class="hidden lg:flex p-1 text-muted hover:text-ink">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="18" rx="0" />
                <path d="M9 3v18" />
              </svg>
            </button>
          </div>

          <!-- Nav Items -->
          <nav class="px-3 py-5 space-y-1 overflow-y-auto flex-1">
            <p class="px-3 text-[10px] text-muted mb-2 tracking-[.15em] hide-on-collapse">
              OVERVIEW
            </p>
            <a
              href="#"
              class="nav-item active flex items-center justify-between px-3 py-2.5 collapse-center"
              title="Dashboard"
            >
              <span class="flex items-center gap-3">
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="shrink-0"
                >
                  <rect x="3" y="3" width="7" height="9" />
                  <rect x="14" y="3" width="7" height="5" />
                  <rect x="14" y="12" width="7" height="9" />
                  <rect x="3" y="16" width="7" height="5" />
                </svg>
                <span class="hide-on-collapse">DASHBOARD</span>
              </span>
              <span class="arrow hide-on-collapse">›</span>
            </a>
            <a
              href="#"
              class="nav-item flex items-center justify-between px-3 py-2.5 text-ink/70 hover:bg-line/60 hover:text-ink collapse-center"
              title="Analytics"
            >
              <span class="flex items-center gap-3">
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="shrink-0"
                >
                  <path d="M3 3v18h18" />
                  <path d="M7 15l4-6 3 3 5-8" />
                </svg>
                <span class="hide-on-collapse">ANALYTICS</span>
              </span>
              <span class="arrow hide-on-collapse">›</span>
            </a>
            <a
              href="orders.html"
              class="nav-item flex items-center justify-between px-3 py-2.5 text-ink/70 hover:bg-line/60 hover:text-ink collapse-center"
              title="Orders"
            >
              <span class="flex items-center gap-3">
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="shrink-0"
                >
                  <circle cx="9" cy="21" r="1" />
                  <circle cx="20" cy="21" r="1" />
                  <path
                    d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"
                  />
                </svg>
                <span class="hide-on-collapse">ORDERS</span>
              </span>
              <span class="arrow hide-on-collapse">›</span>
            </a>
            <a
              href="customers.html"
              class="nav-item flex items-center justify-between px-3 py-2.5 text-ink/70 hover:bg-line/60 hover:text-ink collapse-center"
              title="Customers"
            >
              <span class="flex items-center gap-3">
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="shrink-0"
                >
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                  <circle cx="9" cy="7" r="4" />
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                <span class="hide-on-collapse">CUSTOMERS</span>
              </span>
              <span class="arrow hide-on-collapse">›</span>
            </a>
            <a
              href="products.html"
              class="nav-item flex items-center justify-between px-3 py-2.5 text-ink/70 hover:bg-line/60 hover:text-ink collapse-center"
              title="Products"
            >
              <span class="flex items-center gap-3">
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="shrink-0"
                >
                  <path
                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"
                  />
                  <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                  <line x1="12" y1="22.08" x2="12" y2="12" />
                </svg>
                <span class="hide-on-collapse">PRODUCTS</span>
              </span>
              <span class="arrow hide-on-collapse">›</span>
            </a>

            <p class="px-3 text-[10px] text-muted mb-2 mt-6 tracking-[.15em] hide-on-collapse">
              MANAGE
            </p>
            <a
              href="reports.html"
              class="nav-item flex items-center justify-between px-3 py-2.5 text-ink/70 hover:bg-line/60 hover:text-ink collapse-center"
              title="Reports"
            >
              <span class="flex items-center gap-3">
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="shrink-0"
                >
                  <path d="M9 11l3 3L22 4" />
                  <path
                    d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"
                  />
                </svg>
                <span class="hide-on-collapse">REPORTS</span>
              </span>
              <span class="arrow hide-on-collapse">›</span>
            </a>
            <a
              href="settings.html"
              class="nav-item flex items-center justify-between px-3 py-2.5 text-ink/70 hover:bg-line/60 hover:text-ink collapse-center"
              title="Settings"
            >
              <span class="flex items-center gap-3">
                <svg
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  class="shrink-0"
                >
                  <circle cx="12" cy="12" r="3" />
                  <path
                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"
                  />
                </svg>
                <span class="hide-on-collapse">SETTINGS</span>
              </span>
              <span class="arrow hide-on-collapse">›</span>
            </a>
          </nav>

          <!-- Fixed Bottom Profile Section -->
          <div class="p-4 border-t border-line shrink-0 bg-white">
            <a
              href="profile.html"
              class="flex items-center gap-3 px-2 py-2 hover:bg-line/60 collapse-center transition"
              title="Maya Arif - Operations Lead"
            >
              <div
                class="w-9 h-9 bg-ink text-canvas flex items-center justify-center font-mono font-semibold text-xs shrink-0"
              >
                MA
              </div>
              <div class="leading-tight hide-on-collapse">
                <p class="text-xs font-semibold">MAYA ARIF</p>
                <p class="text-[11px] text-muted">OPERATIONS LEAD</p>
              </div>
            </a>
          </div>
        </div>
      </aside>

      <!-- MAIN -->
      <div class="flex-1 flex flex-col min-w-0">
        <!-- TOPBAR -->
        <header
          class="h-16 bg-canvas border-b border-line flex items-center justify-between px-4 lg:px-8 sticky top-0 z-20 bg-white"
        >
          <div class="flex items-center gap-4 flex-1">
            <button id="menuBtn" class="lg:hidden p-2 -ml-2">
              <svg
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#171717"
                stroke-width="2"
              >
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
              </svg>
            </button>
            <div
              class="relative max-w-md w-full hidden sm:flex items-center border border-line bg-white focus-within:border-ink"
            >
              <span class="pl-3 text-muted text-xs">$</span>
              <input
                type="text"
                placeholder="search orders, customers, products"
                class="w-full bg-transparent pl-2 pr-3 py-2.5 text-[13px] placeholder:text-muted focus:outline-none"
              />
            </div>
          </div>
          <div class="flex items-center gap-5">
            <button class="relative p-2 hover:bg-line/40 transition">
              <svg
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#171717"
                stroke-width="2"
              >
                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9" />
                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
              </svg>
              <span
                class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-green"
                style="border-radius: 50% !important"
              ></span>
            </button>
            <div class="w-px h-6 bg-line"></div>
            <a
              href="profile.html"
              class="text-xs font-mono tracking-wide hidden sm:inline-flex items-center gap-1 hover:underline"
              >› ACCOUNT ‹</a
            >
          </div>
        </header>

        <main class="flex-1 p-4 lg:p-8 space-y-6">
          <!-- page heading -->
          <div
            class="tick p-6 bg-white border border-line flex flex-wrap items-end justify-between gap-4"
          >
            <div>
              <p class="text-[11px] text-muted tracking-[.15em] mb-2 font-mono">
                GOOD AFTERNOON, MAYA // SYSTEM OPERATIONAL
              </p>
              <h1
                class="text-4xl lg:text-5xl font-display leading-none tracking-tight"
              >
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
              <p
                class="font-display text-4xl mt-2 countup"
                data-target="48920"
                data-prefix="$"
              >
                $0
              </p>
              <div class="flex items-center gap-1 mt-3 text-xs text-green font-mono">
                <svg
                  width="12"
                  height="12"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="3"
                >
                  <polyline points="18 15 12 9 6 15" />
                </svg>
                +12.4% VS LAST WEEK
              </div>
            </div>

            <div class="card p-5">
              <p class="text-[11px] text-muted tracking-[.1em]">
                ACTIVE USERS
              </p>
              <p
                class="font-display text-4xl mt-2 countup"
                data-target="6284"
              >
                0
              </p>
              <div class="flex items-center gap-1 mt-3 text-xs text-green font-mono">
                <svg
                  width="12"
                  height="12"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="3"
                >
                  <polyline points="18 15 12 9 6 15" />
                </svg>
                +8.1% VS LAST WEEK
              </div>
            </div>

            <div class="card p-5">
              <p class="text-[11px] text-muted tracking-[.1em]">OPEN ORDERS</p>
              <p
                class="font-display text-4xl mt-2 countup"
                data-target="342"
              >
                0
              </p>
              <div class="flex items-center gap-1 mt-3 text-xs text-muted font-mono">
                <svg
                  width="12"
                  height="12"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="3"
                >
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
              <p
                class="font-display text-4xl mt-2 countup"
                data-target="382"
                data-suffix="%"
                data-decimal="1"
              >
                0%
              </p>
              <div class="flex items-center gap-1 mt-3 text-xs text-green font-mono">
                <svg
                  width="12"
                  height="12"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="3"
                >
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
                  <button
                    class="chart-tab px-3 py-1.5 bg-ink text-canvas transition"
                    data-range="week"
                  >
                    WEEK
                  </button>
                  <button
                    class="chart-tab px-3 py-1.5 text-muted hover:text-ink transition"
                    data-range="month"
                  >
                    MONTH
                  </button>
                </div>
              </div>
              <div class="bar-track" id="barTrack"></div>
              <div
                class="flex justify-between mt-3 text-[10px] text-muted tracking-wide font-mono"
              >
                <span>MON</span><span>TUE</span><span>WED</span><span>THU</span
                ><span>FRI</span><span>SAT</span><span>SUN</span>
              </div>
            </div>

            <!-- terminal-style activity log -->
            <div class="border border-line overflow-hidden flex flex-col">
              <div class="bg-terminal px-4 py-3 flex items-center gap-2 border-b border-white/10">
                <span class="term-dot bg-[#FF5F56]"></span>
                <span class="term-dot bg-[#FFBD2E]"></span>
                <span class="term-dot bg-[#27C93F]"></span>
                <span class="text-[11px] text-white/50 ml-2 font-mono tracking-wider"
                  >activity.log</span
                >
              </div>
              <div
                class="bg-terminal flex-1 p-4 text-[12.5px] leading-relaxed font-mono"
              >
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
              <a
                href="orders.html"
                class="text-xs font-mono tracking-wide inline-flex items-center gap-1 hover:underline"
                >VIEW ALL ›</a
              >
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-[13px]">
                <thead>
                  <tr
                    class="text-left text-muted border-y border-line text-[11px] tracking-[.05em] font-mono"
                  >
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

          <footer class="text-center text-[11px] text-muted py-4 tracking-wide font-mono">
            ORBIT ADMIN — SAMPLE DASHBOARD FOR INTERNAL REVIEW
          </footer>
        </main>
      </div>
    </div>

    <script>
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("overlay");
      const menuBtn = document.getElementById("menuBtn");
      const sidebarToggle = document.getElementById("sidebarToggle");

      menuBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        overlay.classList.toggle("hidden");
      });
      overlay.addEventListener("click", () => {
        sidebar.classList.remove("open");
        overlay.classList.add("hidden");
      });

      // Desktop sidebar collapse toggle
      sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed");
      });

      document.querySelectorAll(".nav-item").forEach((item) => {
        item.addEventListener("click", (e) => {
          e.preventDefault();
          document.querySelectorAll(".nav-item").forEach((i) => {
            i.classList.remove("active");
            i.classList.add("text-ink/70");
          });
          item.classList.add("active");
          item.classList.remove("text-ink/70");
        });
      });

      document.querySelectorAll(".countup").forEach((el) => {
        const target = parseFloat(el.dataset.target);
        const decimals = parseInt(el.dataset.decimal || "0");
        const divisor = decimals ? Math.pow(10, decimals) : 1;
        const prefix = el.dataset.prefix || "";
        const suffix = el.dataset.suffix || "";
        let current = 0;
        const steps = 40;
        const increment = target / steps;
        let step = 0;
        const timer = setInterval(() => {
          step++;
          current += increment;
          if (step >= steps) {
            current = target;
            clearInterval(timer);
          }
          const val = (current / divisor).toLocaleString(undefined, {
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals,
          });
          el.textContent = prefix + val + suffix;
        }, 25);
      });

      const weekData = [3200, 4100, 2800, 5200, 4700, 6100, 5400];
      const monthData = [21000, 24500, 19800, 27200, 25600, 30100, 28900];
      const track = document.getElementById("barTrack");

      function renderChart(data) {
        track.innerHTML = "";
        const max = Math.max(...data);
        data.forEach((val) => {
          const bar = document.createElement("div");
          bar.className = "bar";
          bar.innerHTML = `<span>$${val.toLocaleString()}</span>`;
          track.appendChild(bar);
          requestAnimationFrame(() => {
            bar.style.height = (val / max) * 100 + "%";
          });
        });
        const bars = track.querySelectorAll(".bar");
        const peakIndex = data.indexOf(max);
        bars.forEach((b, i) => b.classList.toggle("peak", i === peakIndex));
      }
      renderChart(weekData);

      document.querySelectorAll(".chart-tab").forEach((tab) => {
        tab.addEventListener("click", () => {
          document.querySelectorAll(".chart-tab").forEach((t) => {
            t.classList.remove("bg-ink", "text-canvas");
            t.classList.add("text-muted");
          });
          tab.classList.add("bg-ink", "text-canvas");
          tab.classList.remove("text-muted");
          renderChart(tab.dataset.range === "week" ? weekData : monthData);
        });
      });

      const statusStyles = {
        Fulfilled: "text-green",
        Processing: "text-[#B8860B]",
        Cancelled: "text-[#B23B3B]",
        Pending: "text-ink",
      };
      const orders = [
        {
          id: "#10245",
          customer: "Sana Tariq",
          product: "Desk Lamp — Oak",
          status: "Fulfilled",
          amount: "$84.00",
        },
        {
          id: "#10244",
          customer: "Bilal Ahmed",
          product: "Ceramic Mug Set",
          status: "Processing",
          amount: "$36.50",
        },
        {
          id: "#10243",
          customer: "Fatima Noor",
          product: "Linen Throw Blanket",
          status: "Fulfilled",
          amount: "$129.00",
        },
        {
          id: "#10242",
          customer: "Omar Sheikh",
          product: "Wall Shelf — Walnut",
          status: "Pending",
          amount: "$62.00",
        },
        {
          id: "#10241",
          customer: "Areeba Khan",
          product: "Table Runner",
          status: "Cancelled",
          amount: "$28.00",
        },
        {
          id: "#10240",
          customer: "Hamza Iqbal",
          product: "Woven Basket — Large",
          status: "Fulfilled",
          amount: "$54.00",
        },
      ];
      const body = document.getElementById("ordersBody");
      orders.forEach((o) => {
        const tr = document.createElement("tr");
        tr.className = "border-b border-line last:border-0 hover:bg-canvas/60 transition-colors";
        tr.innerHTML = `
      <td class="px-6 py-3.5 font-semibold">${o.id}</td>
      <td class="px-6 py-3.5 text-muted">${o.customer}</td>
      <td class="px-6 py-3.5">${o.product}</td>
      <td class="px-6 py-3.5"><span class="tag ${statusStyles[o.status]}">${o.status.toUpperCase()}</span></td>
      <td class="px-6 py-3.5 text-right font-semibold">${o.amount}</td>
    `;
        body.appendChild(tr);
      });
    </script>
  </body>
</html> -->