<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Dummy function that renders the dummy add_to_cart view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('add_to_cart');
    }

    /**
     * Displays the user's cart
     *
     * @param Request $request no required fields
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function displayCart(Request $request) {
        $cart_items = $request->user()->bookings()->where('paid', false)->get();

        return view('cart', ['cart_items' => $cart_items]);
    }

    /**
     * Adds a new item (an unpaid booking) to the user's cart.
     *
     * @param Request $request requires {session_id, adult_qty, child_qty, concession_qty}
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $user = $request->user();
        $session_id = $request->session_id;

        Booking::create(['session_id' => $session_id,
                        'user_id' => $user->id,
                        'adult_qty' => $request->adult_qty,
                        'child_qty' => $request->child_qty,
                        'concession_qty' => $request->concession_qty,
                        'paid' => false])->save();

        return redirect('user/cart');
    }

    /**
     * Updates the ticket quantities for each type in a user's cart item (unpaid booking)
     *
     * @param Request $request requires {booking_id, adult_qty, child_qty, concession_qty}
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateTicketQuantities(Request $request) {
        $booking = Booking::find($request->id);

        $booking->adult_qty = $request->adult_qty;
        $booking->child_qty = $request->child_qty;
        $booking->concession_qty = $request->concession_qty;

        $booking->save();

        return redirect('user/cart');
    }

    /**
     * Deletes a cart item (unpaid booking) for a user
     *
     * @param $id int the booking ID
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id) {
        Booking::destroy($id);
        return redirect('user/cart');
    }


    /**
     * Checks out the entire user cart
     *
     * @param Request $request no required fields
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkout(Request $request) {

        $user_form_fields = array();

        // Validate the user payment details
        $this->validate($request, [
            'name' => 'required|max:255',
            'address' => 'required',
            'suburb' => 'required',
            'post_code' => 'required|numeric',
            'mobile_number' => 'required|numeric',
            'credit_card_number' => 'required|numeric'
        ]);

        // Sanitize the user payment form fields
        array_push($user_form_fields, filter_var($request->name, FILTER_SANITIZE_STRING));
        array_push($user_form_fields, filter_var($request->address, FILTER_SANITIZE_STRING));
        array_push($user_form_fields, filter_var($request->suburb, FILTER_SANITIZE_STRING));
        array_push($user_form_fields, filter_var($request->post_code, FILTER_SANITIZE_NUMBER_INT));
        array_push($user_form_fields, filter_var($request->mobile_number, FILTER_SANITIZE_NUMBER_INT));
        array_push($user_form_fields, filter_var($request->credit_card_number, FILTER_SANITIZE_NUMBER_INT));

        // Check to ensure sanitizing worked
        foreach ($user_form_fields as $form_field) {
            if ($form_field == false) {
                return redirect()->back()->with('message', ['Form sanitizing failed.']);
            }
        }

        $user = $request->user();

        Booking::where('user_id', $user->id)
                ->where('paid', false)
                ->update(['paid' => true]);

        return redirect('user/cart/success');

    }

    /**
     * Return user to booking success after submitting
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function success(Request $request) {
        $user = $request->user();
        return view('booking_success', ['booking' => $user->bookings()->where('paid', true)->get()->last()]);
    }


    /**
     * Dummy controller function to facilitate login redirection to a user's previous location.
     * Used in the "Add to Cart" flow.
     *
     * @param Request $request
     * @return null
     */
    public function authRedirect(Request $request) {
        return null;
    }
}
