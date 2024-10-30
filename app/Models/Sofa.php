<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sofa extends Model
{
    use HasFactory;
    protected $fillable = ['material', 'dimensiones', 'capacidad', 'color'];
    // app/Http/Controllers/SofaController.php

    <?php

    namespace App\Http\Controllers;
    
    use App\Models\Sofa;
    use Illuminate\Http\Request;
    
    class SofaController extends Controller
    {
        public function index()
        {
            $sofas = Sofa::all();
            return view('sofas.index', compact('sofas'));
        }
    
        public function create()
        {
            return view('sofas.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'material' => 'required',
                'dimensiones' => 'required',
                'capacidad' => 'required|integer',
                'color' => 'required',
            ]);
    
            Sofa::create($request->all());
            return redirect()->route('sofas.index')->with('success', 'Sofá creado exitosamente.');
        }
    
        public function edit(Sofa $sofa)
        {
            return view('sofas.edit', compact('sofa'));
        }
    
        public function update(Request $request, Sofa $sofa)
        {
            $request->validate([
                'material' => 'required',
                'dimensiones' => 'required',
                'capacidad' => 'required|integer',
                'color' => 'required',
            ]);
    
            $sofa->update($request->all());
            return redirect()->route('sofas.index')->with('success', 'Sofá actualizado exitosamente.');
        }
    
        public function destroy(Sofa $sofa)
        {
            $sofa->delete();
            return redirect()->route('sofas.index')->with('success', 'Sofá eliminado exitosamente.');
        }
    }
