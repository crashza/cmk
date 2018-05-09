def perfometer_check_patton_active_calls(row, check_command, perf_data):
    calls = float(perf_data[0][1])
    warn = float(perf_data[0][3])
    crit = float(perf_data[0][4])
    if calls >= crit:
        color = "#ff0000"
    elif calls >= warn:
        color = "#ffff00"
    else:
        color = "#00ff00"
    return "%.0f Calls" % calls, perfometer_linear(calls, color)

perfometers['check_mk-patton_active_calls'] = perfometer_check_patton_active_calls
