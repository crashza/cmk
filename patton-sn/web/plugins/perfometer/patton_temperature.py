def perfometer_check_patton_temperature(row, check_command, perf_data):
    temp = float(perf_data[0][1])
    warn = float(perf_data[0][3])
    crit = float(perf_data[0][4])
    if temp >= crit:
        color = "#ff0000"
    elif temp >= warn:
        color = "#ffff00"
    else:
        color = "#00ff00"
    return "%.0fC" % temp, perfometer_linear(temp, color)

perfometers['check_mk-patton_temperature'] = perfometer_check_patton_temperature
