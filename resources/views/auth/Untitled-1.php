if ($user->role === 'owner') {
                // Check the 'owner' column in the 'karyawan' table
                $karyawan = Karyawan::where('nohp', $request->input('nohp'))->first();

                if ($karyawan->owner === 1) {
                    // Redirect to the owner dashboard
                    return redirect()->route('dashboard');
                } else {
                    // User is not an owner (owner !== 1)
                    return back()->with('error', 'Invalid role or access denied.');
                }
            } elseif ($user->role === 'manajer') {
                // Check the 'manajer' column in the 'karyawan' table
                $karyawan = Karyawan::where('nohp', $request->input('nohp'))->first();

                if ($karyawan->manajer === 1) {
                    // Redirect to the manager dashboard
                    return redirect()->route('dashboard.manajer');
                } else {
                    // User is not a manager (manajer !== 1)
                    return back()->with('error', 'Invalid role or access denied.');
                }
            } elseif ($user->role === 'kasir') {
                // Check the 'kasir' column in the 'karyawan' table
                $karyawan = Karyawan::where('nohp', $request->input('nohp'))->first();

                if ($karyawan->kasir === 1) {
                    // Redirect to the cashier dashboard
                    return redirect()->route('dashboard.kasir');
                } else {
                    // User is not a cashier (kasir !== 1)
                    return back()->with('error', 'Invalid role or access denied.');
                }
            } else {
                // User has an invalid role or other conditions are not met
                return back()->with('error', 'Invalid role or access denied.');
            }