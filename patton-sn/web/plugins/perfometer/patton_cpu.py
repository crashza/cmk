def perfometer_check_patton_cpu(row, check_command, perf_data):
    cpu = float(perf_data[0][1])
    warn = float(perf_data[0][3])
    crit = float(perf_data[0][4])
    if cpu >= crit:
        color = "#ff0000"
    elif cpu >= warn:
        color = "#ffff00"
    else:
        color = "#00ff00"
    return "%.0f%%" % cpu, perfometer_linear(cpu, color)

perfometers['check_mk-patton_cpu'] = perfometer_check_patton_cpu
